@extends('layout')


@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">New Chapter Application</div>
@endsection

@section("breadcrumbs")
    <div class="trail"><a href="/">Home</a> > <a href="/chapters">Chapters</a> > <strong>New Chapter Application</strong></div>
@endsection

@section("maincontent")

@php
    $json = "new-chapter-application.json";

@endphp

@php

    $form = "new_chapter_application";

    $pending_registration = \DB::table("registrations")
                            ->where("status", "pending")
                            ->where("user_id", \Auth::user()->id)
                            ->where("form", $form)
                            ->first();

    $pending_approval = \DB::table("registrations")
                            ->where("status", "Pending Registration Approval")
                            ->where("user_id", \Auth::user()->id)
                            ->where("form", $form)
                            ->first();
@endphp


<form class="form ajax_form" id="new_chapter_application">
    <div class="container-fluid bg-black text-white">

        @if($pending_registration)
            <div class="text-center bg-secondary text-white py-2 px-3 d-flex justify-content-between" style="">
                <div>
                    <strong>Continue Pending Registration</strong>
                </div>
                <div>
                    <button class="btn btn-sm btn-dark ajax_btn" data-action="triskelion-registration-cancel">Clear Entry</button>
                </div>
            </div>
        @endif

        <x-fields :json="$json" :formdata="$data" />

    </div>
    <div class="container-fluid">
        <div class="d-flex justify-content-end px-3 pt-3 pb-5">
            <button class="btn btn-dark ajax_btn me-3" data-action="new-chapter-application-cancel">Cancel</button>
            <button class="btn btn-secondary ajax_btn" data-action="new-chapter-application-continue">Submit My Registration</button>
        </div>
    </div>
</form>

<x-modal-affix-signature />


@if($pending_approval != null)

    <div class="modal fade" id="onload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #fdd700;">
                    <h5 class="modal-title" id="modallabel">New Chapter Application</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            You have a pending registration that is currently being reviewed, please wait while we validate your information.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a button type="button" class="btn btn-sm btn-secondary" href="/chapters">Close</a>
                </div>
            </div>
        </div>
    </div>

@endif

<div class="modal fade" id="confirm_registration" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fdd700;">
                <h5 class="modal-title" id="modallabel">New Chapter Application</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        Are you sure that all the information you provided are correct and want to submit this?
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-dark ajax_btn" data-action="new-chapter-application-confirm">Confirm</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section("js")

<script type="text/javascript">

    window.onload = () => {
        $('#onload').modal('show');
    }

    $('#onload').on('shown.bs.modal', function() {
        $('#active_chapter_check').focus();
    });

</script>

@endsection

