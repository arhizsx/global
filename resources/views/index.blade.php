@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
<div class="subheader-text">Tau Gamma Phi Global</div>
@endsection

@section("breadcrumbs")
<div class="trail"><strong>Home</strong></div>
@endsection

@section("maincontent")
<div class="row bg-black" style="padding-top: 100px;">
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-5">
        <a href="/triskelions">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Triskelions</p>
        </a>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-5">
        <a href="/chapters">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Chapters</p>
        </a>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-5">
        <a href="/councils">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Councils</p>
        </a>
    </div>
    {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-5">
        <a href="record-update">
            <svg class="bi me-2 mb-3  menu-item"><use xlink:href="#logo"></use></svg>
            <p>Record Update</p>
        </a>
    </div> --}}
</div>

@endsection
