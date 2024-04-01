@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
<div class="subheader-text">Chapter Triskelion Update</div>
@endsection

@section("maincontent")
<div class="trail"><a href="/record-update">Record Update</a> > <a href="/record-update/chapter/">Chapter</a> > <strong>Triskelion Update</strong></div>

{{-- @php
    $json = "chapter-registration.json";
@endphp

<x-fields :json="$json" /> --}}


@endsection
