@extends('layout')


@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Triskelion Registration</div>
@endsection

@section("maincontent")

@php
    $json = "triskelion-registration.json";
@endphp

<x-fields :json="$json" />

@endsection
