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

<x-fields :json="$json" />

@endsection
