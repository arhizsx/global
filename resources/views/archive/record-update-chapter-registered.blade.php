@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Registered Chapters</div>
@endsection

@section("breadcrumbs")
<div class="trail"><a href="/">Home</a> > <a href="/chapters">Chapters</a> > <a href="/record-update/chapter">Chapter Update</a> > <strong>Registered Chapters</strong></div>
@endsection

@section("maincontent")

@if( \Auth::user()->serial_number != null || \Auth::user()->serial_number != "" )

    <div class="row py-5 border-bottom text-white">
        <div class="col-xl-3 mb-3 ps-4">
            <h4 class="m-start-4">Registered Chapters</h4>
            <small>Chapters you registered in the system</small>
        </div>
        <div class="col-xl-9 mb-3 pe-4 ps-4">
                @if( count($data["chapters"]) > 0 )
                    @foreach($data["chapters"] as $chapter)
                    <div class="fields_box mb-3">
                        <div class="row mb-3">
                            <div class="col-xl-12">
                                <label for="chapter_name">Chapter</label>
                                <input disabled value="{{ $chapter['chapter_name'] ?? "" }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <label for="chapter_type">Chapter Category</label>
                                <input disabled value="{{ $chapter['chapter_type'] ?? "" }}" name="chapter_type" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <label for="date_founded">Date Founded</label>
                                <input disabled value="{{ $chapter['date_founded'] ?? "" }}" name="date_founded" type="date" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <label for="chapter_serial_number">Serial Number</label>
                                <input disabled value="{{ $chapter['chapter_serial_number'] ?? "" }}" name="chapter_serial_number" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <label for="country">Country</label>
                                <input disabled value="{{ $chapter['country'] ?? "" }}" name="country" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <label for="region">Region</label>
                                <input disabled value="{{ $chapter['region'] ?? "" }}" name="region" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <label for="province">Province</label>
                                <input disabled value="{{ $chapter['province'] ?? "" }}" name="province" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <label for="city">City</label>
                                <input disabled value="{{ $chapter['city'] ?? "" }}" name="city" type="text" class="form-control mb-3" placeholder="">
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            @if( $chapter['chapter_serial_number'] != null )
                            <button class="btn btn-sm btn-dark px-3 py-1 ajax-btn" data-action=""><small>SET EDITORS</small></button>
                            @endif
                            {{-- <button class="btn btn-sm btn-secondary px-3 py-1 ajax-btn me-2" data-action=""><small>MORE INFO</small></button> --}}
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="fields_box mb-3">

                        <div class="col text-center">
                            <H5>No Approved Chapter</H5>
                            <small>Please wait for the approval of the chapter you registered</small>
                        </div>
                        </div>
                    </div>
                @endif
        </div>
    </div>

@else
    <div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">

        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
            <svg class="bi me-2 mb-2 menu-item mb-5"><use xlink:href="#logo"></use></svg>
            <p>Please wait for your account to be verified before accessing this section</p>
        </div>
    </div>
@endif


@endsection
