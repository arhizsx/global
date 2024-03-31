@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Record Update</div>
@endsection

@section("maincontent")
<div class="text-white" style="">

@php
    $chapters = \DB::table("chapters")
                ->where("user_id", 10941)
                ->get();

    print_r( $chapters[0]->chapter_name );

@endphp
</div>
@endsection
