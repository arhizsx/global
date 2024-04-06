@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Chapter History</div>
@endsection

@section("breadcrumbs")
    <div class="trail"><a href="/">Home</a> > <a href="/chapters">Chapters</a> > <strong>Chapter History</strong></div>
@endsection

@section("maincontent")

@php
    $json = "chapter-history.json";
@endphp
<form class="form ajax_form" id="new_chapter_application">
    <div class="container-fluid bg-black text-white p-0 m-0">
        <x-fields :json="$json" :formdata="$data" />
    </div>
    <div class="container-fluid">
        <div class="d-flex justify-content-end px-3 pt-3 pb-5">
            <button class="btn btn-dark ajax_btn me-3" data-action="triskelion-registration-cancel" data-next_page="/triskelions">Cancel</button>
            <button class="btn btn-secondary ajax_btn" data-action="triskelion-registration-continue" data-next_page="/triskelions/triskelion-registration/step-2">Submit History</button>
        </div>
    </div>

</form>

@endsection
