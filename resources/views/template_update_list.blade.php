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
    print_r($config);
    print_r($data);
@endphp
</div> --}}

<form class="form ajax_form" id="{{ $config["form"] }}">

    <div class="container-fluid bg-black text-white">
        @if( $config["backlink_title"] == "Chapters" )
            <div class="row py-5 border-bottom text-white">
                <div class="col-xl-3 mb-3 ps-4">
                    <H4>Manage Chapter</H4>
                    <small>Chapters you are allowed to update in the system</small>
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
                                <a class="btn btn-sm btn-dark px-3 py-1" href="/chapters/chapter-update/{{ $chapter->chapter_id ?? "" }}"><small>MANAGE CHAPTER</small></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @elseif( $config["backlink_title"] == "Councils" )
            <div class="row py-5 border-bottom text-white">
                <div class="col-xl-3 mb-3 ps-4">
                    <H4>Manage Council</H4>
                    <small>Councils you are allowed to update in the system</small>
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
                                <a class="btn btn-sm btn-dark px-3 py-1" href="/councils/council-update/{{ $chapter->chapter_id ?? "" }}"><small>MANAGE COUNCIL</small></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>

</form>


@endsection
