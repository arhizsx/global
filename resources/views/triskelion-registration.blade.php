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

@section("breadcrumbs")
    <div class="trail"><a href="/">Home</a> > <a href="/triskelions">Triskelions</a> > <strong>Triskelion Registration</strong></div>
@endsection

@section("maincontent")

@php
    $json = "triskelion-registration.json";
@endphp

<form class="form ajax_form" id="triskelion_registration">
    <div class="container-fluid bg-black text-white">

        <x-fields :json="$json" :formdata="$data" />

    </div>
    <div class="container-fluid">
        <div class="d-flex justify-content-end px-3 pt-3 pb-5">
            <button class="btn btn-dark ajax_btn me-3" data-action="triskelion-registration-cancel" data-next_page="/triskelions">Cancel</button>
            <button class="btn btn-secondary ajax_btn" data-action="triskelion-registration-continue" data-next_page="/triskelions/triskelion-registration/step-2">Submit My Registration</button>
        </div>
    </div>
</form>


<div class="modal" id="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white">
          <h5 class="modal-title">Affix Signature</h5>
          <button type="button" class="btn-close btn-light" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <label>Full Name</label>
                    <input type="text" class="form-control mb-3" value="" name="fullname">
                </div>
                <div class="col-xl-6 col-lg-6">
                    <label>Serial Number</label>
                    <input type="text" class="form-control mb-3" value="" name="serial_number">
                </div>
                <div class="col-xl-6 col-lg-6">
                    <label>Position</label>
                    <input type="text" class="form-control mb-3" value="" name="position">
                </div>
            </div>
            <div class="signature" style="height:200px; width: 100%;"></div>
            <textarea class="form-control d-none" rows="10"; id="signatureJSON" name="signatureJSON"></textarea>
            <button class="btn-sm btn btn-outline-dark ajax_btn mt-1" data-action="clear-signature">Clear Signature</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-dark btn-sm ajax_btn" data-action="set-signature">Set Signature</button>
        </div>
      </div>
    </div>
</div>


@endsection

@section("js")

    <script>
    </script>

@endsection

