@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Chapter Update</div>
@endsection

@section("maincontent")
<div class="trail"><a href="/record-update">Record Update</a> > <strong>Chapter</strong></div>

<div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/record-update/chapter/registered">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Registered</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/record-update/chapter/details">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Chapter Details</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/record-update/chapter/triskelions">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Triskelions</p>
        </a>
    </div>
</div>

@endsection
