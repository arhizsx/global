@extends('layout')


@section("logo")
    <img class="mb-2" src="/images/taugammasigma.png" width="70" height="70">
@endsection

@section("subheader")
    <div class="subheader-text">TGS Chapter Registration</div>
@endsection


@section("maincontent")
@php
    $json = "tgs-chapter-registration.json";
@endphp

<x-fields :json="$json" />

@endsection
