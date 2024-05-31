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
        @if( $config["backlink_title"] == "Chapters" )
            <div class="row py-5 border-bottom text-white">
                <div class="col-xl-3 mb-3 ps-4">
                    <H4>Delegate Chapter</H4>
                    <small>Set chapter editors</small>
                </div>
                <div class="col-xl-9 mb-3 pe-4 ps-4">
                    @foreach($data as $chapter)
                        <div class="fields_box mb-3">
                            <div class="row mb-3">
                                <div class="col-xl-12">
                                    <label for="chapter_name">Chapter</label>
                                    <input disabled value="{{ $chapter->chapter_name ?? "" }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <label for="chapter_type">Chapter Category</label>
                                    <input disabled value="{{ $chapter->chapter_type ?? "" }}" name="chapter_type" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <label for="date_founded">Date Founded</label>
                                    <input disabled value="{{ $chapter->date_founded ?? "" }}" name="date_founded" type="date" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <label for="chapter_serial_number">Serial Number</label>
                                    <input disabled value="{{ $chapter->chapter_serial_number ?? "" }}" name="chapter_serial_number" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <label for="country">Country</label>
                                    <input disabled value="{{ $chapter->country ?? "" }}" name="country" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <label for="region">Region</label>
                                    <input disabled value="{{ $chapter->region ?? "" }}" name="region" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <label for="province">Province</label>
                                    <input disabled value="{{ $chapter->province ?? "" }}" name="province" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <label for="city">City</label>
                                    <input disabled value="{{ $chapter->city ?? "" }}" name="city" type="text" class="form-control mb-3" placeholder="">
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button class="btn btn-sm btn-dark px-3 py-1 ajax_btn" data-action="delegate-chapter-continue" data-chapter_id="{{ $chapter->chapter_id ?? "" }}"><small>DELEGATE CHAPTER</small></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @elseif( $config["backlink_title"] == "Councils" )
            <div class="row py-5 border-bottom text-white">
                <div class="col-xl-3 mb-3 ps-4">
                    <H4>Delegate Council</H4>
                    <small>Set council editors</small>
                </div>
                <div class="col-xl-9 mb-3 pe-4 ps-4">
                    @foreach($data as $chapter)
                        <div class="fields_box mb-3">
                            <div class="row mb-3">
                                <div class="col-xl-12">
                                    <label for="chapter_name">Chapter</label>
                                    <input disabled value="{{ $chapter->chapter_name ?? "" }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <label for="chapter_type">Chapter Category</label>
                                    <input disabled value="{{ $chapter->chapter_type ?? "" }}" name="chapter_type" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <label for="date_founded">Date Founded</label>
                                    <input disabled value="{{ $chapter->date_founded ?? "" }}" name="date_founded" type="date" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4">
                                    <label for="chapter_serial_number">Serial Number</label>
                                    <input disabled value="{{ $chapter->chapter_serial_number ?? "" }}" name="chapter_serial_number" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <label for="country">Country</label>
                                    <input disabled value="{{ $chapter->country ?? "" }}" name="country" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <label for="region">Region</label>
                                    <input disabled value="{{ $chapter->region ?? "" }}" name="region" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <label for="province">Province</label>
                                    <input disabled value="{{ $chapter->province ?? "" }}" name="province" type="text" class="form-control mb-3" placeholder="">
                                </div>
                                <div class="col-xl-3 col-lg-6 col-md-6">
                                    <label for="city">City</label>
                                    <input disabled value="{{ $chapter->city ?? "" }}" name="city" type="text" class="form-control mb-3" placeholder="">
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <button class="btn btn-sm btn-dark px-3 py-1 ajax_btn" data-action="delegate-chapter-continue" data-chapter_id="{{ $chapter->chapter_id ?? "" }}"><small>DELEGATE COUNCIL</small></button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

</form>

<div class="modal fade" id="delegate_modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fdd700;">
                <h5 class="modal-title" id="modallabel">Delegate {{ str_replace( 's', '', $config["backlink_title"] ) }}</h5>
            </div>
            <div class="modal-body">
                <form id="delegate_chapter_form">
                    <input type="hidden" name="chapter_id" value="">
                    <input type="hidden" name="chapter_serial_number" value="">
                    <div class="row">
                        <div class="col-12">
                            <label>Grand Triskelion Email</label>
                            <div class="mb-3 row">
                                <div class="col-9">
                                    <input type="text" class="form-control" id="delegate_gt" name="delegate_gt">
                                </div>
                                <div class="col-3">
                                    <button type="button" class="w-100 btn btn-dark ajax_btn" data-action="delegate_selection" data-type="chapter" data-id="">SET GT</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Deputy Grand Triskelion Email</label>
                            <div class="mb-3 row">
                                <div class="col-9">
                                    <input type="text" class="form-control" id="delegate_dgt" name="delegate_dgt">
                                </div>
                                <div class="col-3">
                                    <button type="button" class="w-100 btn btn-dark ajax_btn" data-action="delegate_selection" data-type="chapter" data-id="">SET DGT</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label>Master Keeper of the Scrolls Email</label>
                            <div class="mb-3 row">
                                <div class="col-9">
                                    <input type="text" class="form-control" id="delegate_mks" name="delegate_mks">
                                </div>
                                <div class="col-3">
                                    <button type="button" class="w-100 btn btn-dark ajax_btn" data-action="delegate_selection" data-type="chapter" data-id="">SET MKS</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
