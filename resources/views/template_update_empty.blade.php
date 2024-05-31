@extends('layouts.layout')

@section("logo")
    {!! $config['logo'] !!}
@endsection

@section("subheader")
    <div class="subheader-text">{{ $config['modal_title'] }}</div>
@endsection


@section("breadcrumbs")
    <div class="trail"><a href="/">Home</a> > <a href="{{ $config['backlink'] }}">{{ $config["backlink_title"] }}</a> > <strong>{{ $config['modal_title'] }}</strong></div>
@endsection

@section("maincontent")

<form class="form ajax_form" id="{{ $config["form"] }}">

    <div class="container-fluid bg-black text-white">

        <div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
                <svg class="bi me-2 mb-2 menu-item mb-5"><use xlink:href="#logo"></use></svg>
                <p>You don't have any chapter to update</p>

            </div>
        </div>

    </div>

</form>


@endsection
