@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
<div class="subheader-text">Chapter Details Update</div>
@endsection

@section("breadcrumbs")
<div class="trail"><a href="/">Home</a> > <a href="/record-update">Record Update</a> > <a href="/record-update/chapter/">Chapter</a> > <strong>Details Update</strong></div>
@endsection

@section("maincontent")

@if( \Auth::user()->serial_number != null || \Auth::user()->serial_number != "" )

    @php
        $json = "chapter-registration.json";
    @endphp
    <form class="form ajax_update_form" id="chapter_details_update">
        <div class="container-fluid bg-black text-white p-0 m-0">
            <x-fields :json="$json" :formdata="$data" />
        </div>
    </form>

@else
<div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">

    <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <svg class="bi me-2 mb-2 menu-item mb-5"><use xlink:href="#logo"></use></svg>
        <p>Please wait for your account to be verified before accessing this section</p>
    </div>
</div>
@endif

@endsection
