@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Triskelions</div>
@endsection

@section("breadcrumbs")
<div class="trail"><a href="/">Home</a> > <strong>Triskelions</strong></div>
@endsection

@section("maincontent")

<div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/triskelions/triskelion-registration">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Triskelion Registration</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/triskelions/lady-triskelion-registration">
            <img class="mb-2 menu-item" src="/images/taugammasigma.png">
            <p>Lady Triskelion Registration</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/triskelions/neophyte-application">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Neophyte Application</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/record-update/profile">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Profile Update</p>
        </a>
    </div>
</div>

@endsection
