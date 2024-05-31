@extends('layouts.layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Councils</div>
@endsection

@section("breadcrumbs")
<div class="trail"><a href="/">Home</a> > <strong>Councils</strong></div>
@endsection

@section("maincontent")
<div class="row bg-black" style="padding-top: 50px;">

    @if( \Auth::user()->serial_number != null )

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
            <a href="/councils/council-registration">
                <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
                <p>Council Registration</p>
            </a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
            <a href="/councils/council-update">
                <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
                <p>Council Update</p>
            </a>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
            <a href="/councils/delegate-council">
                <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
                <p>Delegate Council</p>
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
