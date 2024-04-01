@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Neophyte Application</div>
@endsection

@section("maincontent")

@php
    $json = "new-chapter-application.json";
@endphp

<x-fields :json="$json" />

@endsection
