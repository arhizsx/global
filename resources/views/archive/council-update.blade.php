@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Council Update</div>
@endsection

@section("breadcrumbs")
<div class="trail"><a href="/">Home</a> > <a href="/record-update">Record Update</a> > <strong>Council</strong></div>
@endsection

@section("maincontent")

<div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">
@if( \Auth::user()->serial_number != null || \Auth::user()->serial_number != "" )

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/record-update/council/registered">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Registered</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/record-update/council/details">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Council Details</p>
        </a>
    </div>

@else

    <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <svg class="bi me-2 mb-2 menu-item mb-5"><use xlink:href="#logo"></use></svg>
        <p>Please wait for your account to be verified before accessing this section</p>
    </div>

@endif


</div>


@endsection
