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
{{-- <div class="text-white">
@php
    print_r($data);
@endphp
</div> --}}

<form class="form ajax_form" id="{{ $config["form"] }}">
    <div class="container-fluid bg-black text-white">

        @if ($config["pending_registration"] )
            <div class="text-center bg-secondary text-white py-2 px-3 d-flex justify-content-between" style="">
                <div>
                    <strong>Continue Pending Registration</strong>
                </div>
                <div>
                    <x-button-ajax-btn :label="$config['button_cancel_label']" :action="$config['button_cancel_action']" :margin="$config['button_cancel_margin']" />
                </div>
            </div>
        @endif

        <x-fields :json="$config['json']" :formdata="$data" />

    </div>
    <div class="container-fluid">
        <div class="d-flex justify-content-end px-3 pt-3 pb-5">
            <x-button-ajax-btn :label="$config['button_cancel_label']" :action="$config['button_cancel_action']" :margin="$config['button_cancel_margin']" />
            <x-button-ajax-btn :label="$config['button_continue_label']" :action="$config['button_continue_action']" />

        </div>
    </div>
</form>

<x-modal-affix-signature />

@if( $config['chapter_check'] == true )
    @if( $config['pending_registration'] == null && $config['pending_approval'] == null )

        <x-modal-chapter-check />

    @endif
@endif

@if($config['pending_approval'] != null)
    <x-modal-pending-registration  :title="$config['modal_title']" :backlink="$config['backlink']" />
@endif

<x-modal-submit-confirm :action="$config['modal_confirm_action']" :title="$config['modal_title']" />


@endsection
