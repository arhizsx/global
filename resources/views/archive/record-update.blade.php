@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Record Update</div>
@endsection

@section("breadcrumbs")
<div class="trail"><a href="/">Home</a> > <strong>Record Update</strong></div>
@endsection
@section("maincontent")

<div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/record-update/council">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Council Update</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
        <a href="/record-update/chapter">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Chapter Update</p>
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
