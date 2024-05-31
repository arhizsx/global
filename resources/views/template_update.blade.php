@extends('layouts.layout')

@section("logo")
    {!! $config['logo'] !!}
@endsection

@section("subheader")
    <div class="subheader-text">{{ $config['modal_title'] }}</div>
@endsection


@section("breadcrumbs")
    <div class="trail"><a href="/">Home</a> > <a href="{{ $config['backlink'] }}">{{ $config["backlink_title"] }}</a> > <a href="{{ $config['backlink'] }}{{ str_replace( "s","", $config['backlink']) ."-update" }}">{{ str_replace("s", "", $config["backlink_title"]) }} Update</a> > <strong>{{ $data["fields_data"]["chapter_name"] }}</strong></div>
@endsection

@section("maincontent")

{{-- <div class="text-white">
@php
    // dd($data);
    print_r($data);
    print_r($config);
@endphp
</div> --}}

@if( $config["backlink_title"] == "Chapters" )
<div class="mt-3">

    <a class="btn text-dark bg-warning ms-4 me-2" href="/chapters/chapter-update/{{ $data["fields_data"]["chapter_id"] }}">Details</a>
    <a class="btn text-white bg-secondary" href="/chapters/chapter-update/{{ $data["fields_data"]["chapter_id"] }}/triskelions">Triskelions</a>

</div>
@endif

<form class="form ajax_form" id="{{ $config["form"] }}">
    @if($data["fields_data"] != null)
        @if($data["fields_data"]["user_id"] == Auth::user()->id)
            <div class="container-fluid bg-black text-white">

                <x-fields :json="$config['json']" :formdata="$data" />

            </div>
        @else
            <div class="container-fluid bg-black text-white">
                <div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
                        <svg class="bi me-2 mb-2 menu-item mb-5"><use xlink:href="#logo"></use></svg>
                        <p>You are not allowed to view page</p>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="container-fluid bg-black text-white">
            <div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
                    <svg class="bi me-2 mb-2 menu-item mb-5"><use xlink:href="#logo"></use></svg>
                    <p>You are not allowed to view page</p>
                </div>
            </div>
        </div>
    @endif

</form>


@endsection
