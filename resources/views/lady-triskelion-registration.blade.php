@extends('layout')

@section("logo")
    <img class="mb-2" src="/images/taugammasigma.png" width="70" height="70">
@endsection

@section("subheader")
    <div class="subheader-text">Lady Triskelion Registration</div>
@endsection

@section("maincontent")

@php
    $json = "triskelion-registration.json";
@endphp

<x-fields :json="$json" />

@endsection
