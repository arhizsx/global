@extends('layouts.layout')

@section("logo")
    {!! $config['logo'] !!}
@endsection

@section("subheader")
    <div class="subheader-text">{{ $config['modal_title'] }}</div>
@endsection


@section("breadcrumbs")
    <div class="trail"><a href="/">Home</a> > <a href="{{ $config['backlink'] }}">{{ $config["backlink_title"] }}</a> > <strong>Profile Update</strong></div>
@endsection

@section("maincontent")

<form class="form ajax_form" id="{{ $config["form"] }}">
    {{-- <div class="text-white">
    @php
        print_r($data);
    @endphp
    </div> --}}
    <div class="container-fluid bg-black text-white">

        <x-fields :json="$config['json']" :formdata="$data" />

    </div>


</form>


@endsection
