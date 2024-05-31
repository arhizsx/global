@extends('layout')


@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Chapter Update</div>
@endsection

@section("breadcrumbs")
<div class="trail"><a href="/">Home</a> > <a href="/chapters">Chapters</a> >  <a href="/chapters/record-update">Chapter Update</a> > <strong>{{ $data["chapter"]["chapter_name"] }}</strong></div>
@endsection

@section("maincontent")

<div style="color: white">
@php

$data = [
    "fields_data" => $data["chapter"]
];

@endphp

</div>

    @php
        $json = "chapter-details-update.json";
    @endphp
    <form class="form ajax_update_form" id="chapter_details_update">
        <div class="container-fluid bg-black text-white p-0 m-0">
            <x-fields :json="$json" :formdata="$data" />
        </div>
    </form>


    <div class="modal fade" id="delegate_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #fdd700;">
                    <h5 class="modal-title" id="modallabel">Delegate Chapter</h5>
                </div>
                <div class="modal-body">
                    <form id="delegate_chapter_form">
                        <input type="hidden" name="chapter_id" value="">
                        <input type="hidden" name="chapter_serial_number" value="">
                        <div class="row">
                            <div class="col-12">
                                <label>Grand Triskelion Email</label>
                                <input type="text" class="form-control mb-3" id="delegate_gt" name="delegate_gt">
                            </div>
                            <div class="col-12">
                                <label>Deputy Grand Triskelion Email</label>
                                <input type="text" class="form-control mb-3" id="delegate_dgt" name="delegate_dgt">
                            </div>
                            <div class="col-12">
                                <label>Master Keeper of the Scrolls Email</label>
                                <input type="text" class="form-control mb-3" id="delegate_mks" name="delegate_mks">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-sm btn-dark ajax_btn" data-action="delegate_chapter">Confirm</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("js")

    <script type="text/javascript">

        $(document).on("click", ".show_modal", () => {

            $(document).find("#delegate_modal").modal("show");

        });

    </script>

@endsection
