@php

$json_path = Storage::disk('configs')->get($json);
$config_decoded = json_decode($json_path, true);

@endphp

<div class="container-fluid bg-black text-white">
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
                                    <label for="{{ $field["name"] }}">{{ $field["label"] }}</label>
                                    <input name="{{ $field["name"] }}" type="text" class="form-control mb-3 {{ $field["class"] ?? '' }}" placeholder="{{ $field["placeholder"] }}">
                                </div>
                            @elseif( $field["type"] == "date")
                                <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                                    <label for="{{ $field["name"] }}">{{ $field["label"] }}</label>
                                    <input name="{{ $field["name"] }}" type="date" class="form-control mb-3 {{ $field["class"] ?? '' }}" placeholder="{{ $field["placeholder"] }}">
                                </div>
                            @elseif( $field["type"] == "select")
                                <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                                    <label for="{{ $field["name"] }}">{{ $field["label"] }}</label>
                                    <select name="{{ $field["name"] }}" class="form-control mb-3 {{ $field["class"] ?? '' }}">
                                        <option value="">{{ $field["placeholder"] }}</option>
                                        @if(array_key_exists("options", $field ))
                                            @foreach($field["options"] as $option)
                                                <option value="{{ $option["value"] }}">{{ $option["text"] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            @elseif( $field["type"] == "select_loop")
                                <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                                    <label for="{{ $field["name"] }}">{{ $field["label"] }}</label>
                                    <select name="{{ $field["name"] }}" class="form-control mb-3 {{ $field["class"] ?? '' }}">
                                        <option value="">{{ $field["placeholder"] }}</option>
                                        @php
                                            if($field["type_options"]["end"] == "%THIS_YEAR%"){
                                                $end = date("Y");
                                            } else {
                                                $end = $field["type_options"]["end"];
                                            }
                                        @endphp

                                        @for( $i = $field["type_options"]["start"]; $i <= $end; $i++ )
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            @elseif( $field["type"] == "select_table")
                                <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                                    <label for="{{ $field["name"] }}">{{ $field["label"] }}</label>
                                    <select name="{{ $field["name"] }}" class="form-control mb-3 {{ $field["class"] ?? '' }}">
                                        <option value="">{{ $field["placeholder"] }}</option>

                                    </select>
                                </div>

                            @elseif($field["type"] == "textarea")

                                <div class=" col-xl-{{ $field['col-xl'] ?? ''}} col-lg-{{ $field['col-lg'] ?? ''}} col-md-{{ $field['col-md'] ?? ''}}">
                                    <label for="{{ $field["name"] }}">{{ $field["label"] }}</label>
                                    <textarea class="form-control mb-3 {{ $field["class"] ?? '' }}" rows="15" name="{{ $field["name"] }}"></textarea>
                                </div>


                            @else

                                {{ print_r( $field ) }}

                            @endif


                        @elseif( $field["category"] == "multiple" )

                            @foreach($field['fields'] as $flds)

                                @if($flds["type"] == "text")

                                    <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                        <label for="{{ $flds["name"] }}">{{ $flds["label"] }}</label>
                                        <input name="{{ $flds["name"] }}" type="text" class="form-control mb-3 {{ $field["class"] ?? '' }}" placeholder="{{ $flds["placeholder"] }}">
                                    </div>

                                @elseif($flds["type"] == "select")

                                    <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                        <label for="{{ $flds["name"] }}">{{ $flds["label"] }}</label>
                                        <select name="{{ $flds["name"] }}" class="form-control mb-3 {{ $field["class"] ?? '' }}">
                                            @if(array_key_exists("options", $flds ))
                                                <option value="">{{ $flds["placeholder"] }}</option>

                                                @foreach($flds["options"] as $options)
                                                    <option value="{{ $options["value"] }}">{{ $options["text"] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                @elseif($flds["type"] == "select_loop")

                                    <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                        <label for="{{ $flds["name"] }}">{{ $flds["label"] }}</label>
                                        <select name="{{ $flds["name"] }}" class="form-control mb-3 {{ $field["class"] ?? '' }}">
                                            <option value="">{{ $flds["placeholder"] }}</option>
                                            @php
                                                if($flds["type_options"]["end"] == "%THIS_YEAR%"){
                                                    $end = date("Y");
                                                } else {
                                                    $end = $flds["type_options"]["end"];
                                                }
                                            @endphp

                                            @for( $i = $flds["type_options"]["start"]; $i <= $end; $i++ )
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>

                                @elseif($flds["type"] == "select_table")

                                    <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                        <label for="{{ $flds["name"] }}">{{ $flds["label"] }}</label>
                                        <select name="{{ $flds["name"] }}" class="form-control mb-3 {{ $field["class"] ?? '' }}">
                                            <option value="">{{ $flds["placeholder"] }}</option>
                                        </select>
                                    </div>

                                @elseif($flds["type"] == "textarea")

                                    <div class=" col-xl-{{ $flds['col-xl'] ?? ''}} col-lg-{{ $flds['col-lg'] ?? ''}} col-md-{{ $flds['col-md'] ?? ''}}">
                                        <label for="{{ $flds["name"] }}">{{ $flds["label"] }}</label>
                                        <textarea class="form-control mb-3 {{ $field["class"] ?? '' }}" name="{{ $flds["name"] }}"></textarea>
                                    </div>

                                @else

                                    {{ print_r( $flds ) }}
                                @endif

                            @endforeach
                            <div class="d-flex flex-row-reverse">
                                <button class="btn btn-sm btn-dark px-3 py-1"><small>ADD</small></button>
                            </div>

                        @endif

                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>
