@extends('layouts.layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Chapters</div>
@endsection

@section("breadcrumbs")
<div class="trail"><a href="/">Home</a> > <strong>Chapters</strong></div>
@endsection

@section("maincontent")

<div class="row bg-black" style="padding-top: 50px;">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-5">
        <a href="/chapters/chapter-registration">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Chapter Registration</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-5">
        <a href="/chapters/tgs-chapter-registration">
            <img class="mb-2  menu-item" src="/images/taugammasigma.png">
            <p>TGS Chapter Registration</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-5">
        <a href="/chapters/new-chapter-application">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>New Chapter Application</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-5">
        <a href="/chapters/chapter-history">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Chapter History</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-5">
        <a href="/chapters/chapter-update">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Chapter Update</p>
        </a>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-5">
        <a href="/chapters/delegate-chapter">
            <svg class="bi me-2 mb-2 menu-item"><use xlink:href="#logo"></use></svg>
            <p>Delegate Chapter</p>
        </a>
    </div>

</div>

@endsection
