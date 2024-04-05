@php

$json_path = Storage::disk('configs')->get($json);
$config_decoded = json_decode($json_path, true);

if(! function_exists('FieldData')) {
    function FieldData( $field_name, $formdata ){

        if($formdata != null){
            if(array_key_exists("fields_data", $formdata)){
                foreach($formdata["fields_data"] as $key => $fld_val){
                    if( $key == $field_name ){
                        return $fld_val;
                    }
                }
                return null;
            }
        } else {
            return null;
        }
    }
}

if(! function_exists('FieldDataMulti')) {
    function FieldDataMulti( $fieldgroup, $fieldgroup_id, $field_name, $formdata ){

        if($formdata != null){
            if(array_key_exists("fields_data", $formdata)){
                foreach($formdata["fields_data"] as $fldgrp_key => $fldgrp_val){
                    if( $fldgrp_key == $fieldgroup ){
                        foreach(  $formdata["fields_data"][$fieldgroup]["fields"] as $flds_key => $flds_val  ){
                            if( $flds_val["id"] == $fieldgroup_id  ){
                                if( array_key_exists($field_name . '[]',  $flds_val["fields"] ) ){
                                    return $flds_val["fields"][$field_name . '[]'];
                                }
                            } else {
                                return null;
                            }
                        }
                    }
                }
                return null;
            }
        } else {
            return null;
        }
    }
}

@endphp

@foreach( $config_decoded["fields_definition"] as $group )
<div class="row py-5 border-bottom">
    <div class="col-xl-3 mb-3 ps-4">
        <H4 class="m-start-4">{{ $group["group"] }}</H4>
        <small>{{ $group["instruction"] }}</small>
    </div>
    <div class="col-xl-9 mb-3 pe-4 ps-4">
        <div class="fields_box row">
            @foreach( $group["fields"] as $field )


                @if( $field["category"] == "singular" )

                    @if( $field["type"] == "text")
                        <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                            <label for="{{ $field["name"] }}">{{ $field["label"] }} {{ $field["required"] === true ? "*" : "" }}</label>
                            <input name="{{ $field["name"] }}" type="text" class="form-control mb-3 {{ $field["class"] ?? '' }}" placeholder="{{ $field["placeholder"] }}" value="{{ FieldData( $field["name"], $formdata ) }}">
                        </div>
                    @elseif( $field["type"] == "date")
                        <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                            <label for="{{ $field["name"] }}">{{ $field["label"] }} {{ $field["required"] === true ? "*" : "" }}</label>
                            <input name="{{ $field["name"] }}" type="date" class="form-control mb-3 {{ $field["class"] ?? '' }}" placeholder="{{ $field["placeholder"] }}" value="{{ FieldData( $field["name"], $formdata ) }}">
                        </div>
                    @elseif( $field["type"] == "select")
                        <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                            <label for="{{ $field["name"] }}">{{ $field["label"] }} {{ $field["required"] === true ? "*" : "" }}</label>
                            <select name="{{ $field["name"] }}" class="form-control mb-3 {{ $field["class"] ?? '' }}">
                                <option value="">{{ $field["placeholder"] }}</option>
                                @if(array_key_exists("options", $field ))
                                    @php
                                        $select_value = FieldData( $field["name"], $formdata );
                                    @endphp
                                    @foreach($field["options"] as $option)
                                        <option value="{{ $option["value"] }}" {{ $select_value == $option["value"] ? 'selected' : '' }}>{{ $option["text"] }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    @elseif( $field["type"] == "select_loop")
                        <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                            <label for="{{ $field["name"] }}">{{ $field["label"] }} {{ $field["required"] === true ? "*" : "" }}</label>
                            <select name="{{ $field["name"] }}" class="form-control mb-3 {{ $field["class"] ?? '' }}">
                                <option value="">{{ $field["placeholder"] }}</option>
                                @php
                                    if($field["type_options"]["end"] == "%THIS_YEAR%"){
                                        $end = date("Y");
                                    } else {
                                        $end = $field["type_options"]["end"];
                                    }
                                    $select_value = FieldData( $field["name"], $formdata );
                                @endphp

                                @for( $i = $field["type_options"]["start"]; $i <= $end; $i++ )


                                    <option value="{{ $i }}" {{ $select_value == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    @elseif( $field["type"] == "select_table")
                        <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                            <label for="{{ $field["name"] }}">{{ $field["label"] }} {{ $field["required"] === true ? "*" : "" }}</label>
                            <select name="{{ $field["name"] }}" class="form-control mb-3 {{ $field["class"] ?? '' }}">
                                <option value="">{{ $field["placeholder"] }}</option>
                                @php
                                    $select_value =  FieldData( $field["name"], $formdata );
                                @endphp

                            </select>
                        </div>
                    @elseif($field["type"] == "textarea")

                        <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                            <label for="{{ $field["name"] }}">{{ $field["label"] }} {{ $field["required"] === true ? "*" : "" }}</label>
                            <textarea class="form-control mb-3 {{ $field["class"] ?? '' }}" rows="15" name="{{ $field["name"] }}">
                                {{ FieldData( $field["name"], $formdata ) }}
                            </textarea>
                        </div>


                    @else

                        {{ print_r( $field ) }}

                    @endif


                @elseif( $field["category"] == "multiple" )


                    @if( array_key_exists( $field["name"], $formdata["fields_data"]  ) )

                        @foreach( $formdata["fields_data"][$field["name"]]["fields"] as $data_avlb )

                            @if( $data_avlb["id"] != 0 )
                                <div class="col-12 py-0 pe-3 mb-1 d-flex flex-row-reverse">
                                    <button style="margin-top: -10px;" class="py-0 btn-danger btn btn-sm ajax_btn" data-action="fieldgroup_remove" data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="{{ $data_avlb["id"] }}">remove</button>
                                </div>
                            @endif

                            <div class="fieldgroup_box row p-0 m-0" data-fieldgroup_name="{{ $field["name"]  ?? "" }}" data-fieldgroup_id="{{ $data_avlb["id"] }}">

                                @foreach($field['fields'] as $flds)

                                    @if($flds["type"] == "text")

                                        <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                            <label for="{{ $flds["name"] }}[]">{{ $flds["label"] }} {{ $flds["required"] === true ? "*" : "" }}</label>
                                            <input value="{{ $data_avlb["fields"][ $flds["name"]."[]" ] ?? ''  }}" name="{{ $flds["name"] }}[]" type="text" class="form-control mb-3 {{ $flds["class"] ?? '' }}" placeholder="{{ $flds["placeholder"] }}"  data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="{{ $data_avlb["id"] }}">
                                        </div>

                                    @elseif($flds["type"] == "select")
                                        <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">

                                            <label for="{{ $flds["name"] }}[]">{{ $flds["label"] }} {{ $flds["required"] === true ? "*" : "" }}</label>
                                            <select name="{{ $flds["name"] }}[]" class="form-control mb-3 {{ $flds["class"] ?? '' }}" data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="{{ $data_avlb["id"] }}">
                                                @if(array_key_exists("options", $flds ))

                                                    @php
                                                        if(array_key_exists($flds["name"]."[]", $data_avlb["fields"] )){
                                                            $select_value = $data_avlb["fields"][ $flds["name"]."[]" ];
                                                            print_r($select_value);
                                                        } else {
                                                            $select_value = "";
                                                        }
                                                    @endphp

                                                    <option value="">{{ $flds["placeholder"] }}</option>
                                                    @foreach($flds["options"] as $options)

                                                        @php
                                                            if( $select_value == $options["value"] ){
                                                                $selected = "selected";
                                                            } else {
                                                                $selected = "";
                                                            }
                                                        @endphp

                                                        <option value="{{ $options["value"] }}" {{ $selected }} >{{ $options["text"] }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                    @elseif($flds["type"] == "select_loop")

                                        <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                            <label for="{{ $flds["name"] }}[]">{{ $flds["label"] }} {{ $flds["required"] === true ? "*" : "" }}</label>
                                            <select name="{{ $flds["name"] }}[]" class="form-control mb-3 {{ $flds["class"] ?? '' }}"  data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="{{ $data_avlb["id"] }}">
                                                <option value="">{{ $flds["placeholder"] }}</option>
                                                @php
                                                    if($flds["type_options"]["end"] == "%THIS_YEAR%"){
                                                        $end = date("Y");
                                                    } else {
                                                        $end = $flds["type_options"]["end"];
                                                    }

                                                    if(array_key_exists($flds["name"]."[]", $data_avlb["fields"] )){
                                                        $select_value = $data_avlb["fields"][ $flds["name"]."[]" ];
                                                    } else {
                                                        $select_value = "";
                                                    }

                                                @endphp

                                                @for( $i = $flds["type_options"]["start"]; $i <= $end; $i++ )
                                                    @php
                                                        if( $select_value == $i["value"] ){
                                                            $selected = "selected";
                                                        } else {
                                                            $selected = "";
                                                        }
                                                    @endphp

                                                    <option value="{{ $i }}" {{ $selected }} >{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                    @elseif($flds["type"] == "select_table")

                                        <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                            <label for="{{ $flds["name"] }}[]">{{ $flds["label"] }} {{ $flds["required"] === true ? "*" : "" }}</label>
                                            <select name="{{ $flds["name"] }}[]" class="form-control mb-3 {{ $flds["class"] ?? '' }}"  data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="{{ $data_avlb["id"] }}">
                                                @php
                                                    if(array_key_exists($flds["name"]."[]", $data_avlb["fields"] )){
                                                        $select_value = $data_avlb["fields"][ $flds["name"]."[]" ];
                                                    } else {
                                                        $select_value = "";
                                                    }
                                                @endphp
                                                <option value="">{{ $flds["placeholder"] }}</option>
                                            </select>
                                        </div>

                                    @elseif($flds["type"] == "textarea")

                                        <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                            <label for="{{ $flds["name"] }}[]">{{ $flds["label"] }} {{ $flds["required"] === true ? "*" : "" }}</label>
                                            @php
                                                if(array_key_exists($flds["name"]."[]", $data_avlb["fields"] )){
                                                    $select_value = $data_avlb["fields"][ $flds["name"]."[]" ];
                                                } else {
                                                    $select_value = "";
                                                }
                                            @endphp
                                            <textarea class="form-control mb-3 {{ $field["class"] ?? '' }}" name="{{ $flds["name"] }}]" data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="{{ $data_avlb["id"] }}">{{ $select_value }}</textarea>
                                        </div>

                                    @else
                                        {{ print_r( $flds ) }}
                                    @endif

                                @endforeach
                            </div>

                        @endforeach

                    @else

                        <div class="fieldgroup_box row p-0 m-0" data-fieldgroup_name="{{ $field["name"]  ?? "" }}" data-fieldgroup_id="0">

                            @foreach($field['fields'] as $flds)

                                @if($flds["type"] == "text")

                                    <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                        <label for="{{ $flds["name"] }}[]">{{ $flds["label"] }} {{ $flds["required"] === true ? "*" : "" }}</label>
                                        <input value="{{ FieldDataMulti( $field["name"], 0, $flds["name"], $formdata ) }}" name="{{ $flds["name"] }}[]" type="text" class="form-control mb-3 {{ $flds["class"] ?? '' }}" placeholder="{{ $flds["placeholder"] }}"  data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="0">
                                    </div>

                                @elseif($flds["type"] == "select")

                                    <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                        <label for="{{ $flds["name"] }}[]">{{ $flds["label"] }} {{ $flds["required"] === true ? "*" : "" }}</label>
                                        <select name="{{ $flds["name"] }}[]" class="form-control mb-3 {{ $flds["class"] ?? '' }}" data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="0">
                                            @if(array_key_exists("options", $flds ))
                                                <option value="">{{ $flds["placeholder"] }}</option>
                                                @php
                                                    $select_value = FieldDataMulti( $field["name"], 0, $flds["name"], $formdata );
                                                @endphp
                                                @foreach($flds["options"] as $options)
                                                    <option value="{{ $options["value"] }} {{ $options["value"] == $select_value ? "selected" : "" }} ">{{ $options["text"] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                @elseif($flds["type"] == "select_loop")

                                    <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                        <label for="{{ $flds["name"] }}[]">{{ $flds["label"] }} {{ $flds["required"] === true ? "*" : "" }}</label>
                                        <select name="{{ $flds["name"] }}[]" class="form-control mb-3 {{ $flds["class"] ?? '' }}"  data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="0">
                                            <option value="">{{ $flds["placeholder"] }}</option>
                                            @php
                                                if($flds["type_options"]["end"] == "%THIS_YEAR%"){
                                                    $end = date("Y");
                                                } else {
                                                    $end = $flds["type_options"]["end"];
                                                }

                                                $select_value = FieldDataMulti( $field["name"], 0, $flds["name"], $formdata );

                                            @endphp

                                            @for( $i = $flds["type_options"]["start"]; $i <= $end; $i++ )
                                                <option value="{{ $i }}" {{ $i == $select_value ? "selected" : "" }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                @elseif($flds["type"] == "select_table")

                                    <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                        <label for="{{ $flds["name"] }}[]">{{ $flds["label"] }} {{ $flds["required"] === true ? "*" : "" }}</label>
                                        <select name="{{ $flds["name"] }}[]" class="form-control mb-3 {{ $flds["class"] ?? '' }}"  data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="0">
                                            @php
                                                $select_value = FieldDataMulti( $field["name"], 0, $flds["name"], $formdata );
                                            @endphp
                                            <option value="">{{ $flds["placeholder"] }}</option>
                                        </select>
                                    </div>

                                @elseif($flds["type"] == "textarea")

                                    <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                        <label for="{{ $flds["name"] }}[]">{{ $flds["label"] }} {{ $flds["required"] === true ? "*" : "" }}</label>
                                        @php
                                            $select_value = FieldDataMulti( $field["name"], 0, $flds["name"], $formdata );
                                        @endphp
                                        <textarea class="form-control mb-3 {{ $field["class"] ?? '' }}" name="{{ $flds["name"] }}]" data-fieldgroup_name="{{ $field["name"] ?? "" }}" data-fieldgroup_id="0">{{ $select_value }}</textarea>
                                    </div>

                                @else
                                    {{ print_r( $flds ) }}
                                @endif

                            @endforeach

                        </div>

                    @endif


                    <div class="d-flex flex-row-reverse">
                        <button class="btn btn-sm btn-dark px-3 py-1 ajax_btn" data-action="fieldgroup-add" data-fieldgroup_name="{{ $field["name"]  ?? "" }}"><small>ADD</small></button>
                    </div>

                @elseif( $field["category"] == "signature" )
                    @php
                        if( array_key_exists( $field["name"], $formdata["fields_data"] ) ){
                            $sign = $formdata[ "fields_data" ][ $field["name"] ]["fields"][0]["fields"]["signature[]"];
                        } else {
                            $sign = "";
                        }
                    @endphp
                    <div class="row">
                        <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                            <div class="signbox_main">
                                <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="{{ $field["name"] }}">
                                    <div class="signature" data-signbox="{{ $field["name"] }}"></div>
                                    <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="{{ $field["name"] }}" data-fieldgroup_name="{{ $field["name"] }}" data-fieldgroup_id="0">{{ $sign }}</textarea>
                                </div>
                            </div>
                            <div class="sign-box w-100">Name & Signature of Current Chapter Officer<button class="btn btn-dark btn-sm ajax_btn ms-4  my-3" data-action="affix-signature" data-signbox="{{ $field["name"] }}">{{ $field["label"] }}</button></div>
                        </div>
                    </div>

                @elseif( $field["category"] == "html" )

                    {!! $field["html"] !!}

                @endif

            @endforeach
        </div>
    </div>
</div>
@endforeach
