@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Registered Chapters</div>
@endsection

@section("maincontent")
<div class="trail"><a href="/record-update">Record Update</a> > <a href="/record-update/chapter/">Chapter</a> > <strong>Registered Chapters</strong></div>

<div class="row py-5 border-bottom text-white">
        <div class="col-xl-3 mb-3 ps-4">
            <h4 class="m-start-4">Registered Chapters</h4>
            <small>Chapters you registered in the system</small>
        </div>
        <div class="col-xl-9 mb-3 pe-4 ps-4">
                @php
                    $chapters = \DB::table("chapters")
                                ->join("countries", "countries.Code2", "chapters.country")
                                ->where("user_id", 822)
                                ->whereNotNull("chapter_serial_number")
                                ->get();
                @endphp
                @if( count($chapters) > 0 )
                    @foreach($chapters as $chapter)
                    <div class="fields_box mb-3">

                        <div class="row mb-3">
                            <div class="col-xl-12">
                                <label for="chapter_name">Chapter</label>
                                <input disabled value="{{ $chapter->chapter_name }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <label for="chapter_name">Chapter Category</label>
                                <input disabled value="{{ $chapter->chapter_type }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <label for="chapter_name">Date Founded</label>
                                <input disabled value="{{ $chapter->date_founded }}" name="chapter_name" type="date" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <label for="chapter_name">Serial Number</label>
                                <input disabled value="{{ $chapter->chapter_serial_number }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <label for="chapter_name">Country</label>
                                <input disabled value="{{ $chapter->Country }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <label for="chapter_name">Region</label>
                                <input disabled value="{{ $chapter->region }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <label for="chapter_name">Province</label>
                                <input disabled value="{{ $chapter->province }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <label for="chapter_name">City</label>
                                <input disabled value="{{ $chapter->city }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label for="chapter_name">Grand Triskelion (email)</label>
                                <input value="" name="chapter_name" type="email" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label for="chapter_name">Deputy Grand Triskelion (email)</label>
                                <input value="" name="chapter_name" type="email" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label for="chapter_name">Master Keeper of Scrolls (email)</label>
                                <input value="" name="chapter_name" type="email" class="form-control mb-3" placeholder="">
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button class="btn btn-sm btn-dark px-3 py-1 ajax-btn" data-action=""><small>SET EDITORS</small></button>
                            <button class="btn btn-sm btn-secondary px-3 py-1 ajax-btn me-2" data-action=""><small>MORE INFO</small></button>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="col text-center">
                            <H5>No Approved Chapter</H5>
                            <small>Please wait for the approval of the chapter you registered</small>
                        </div>
                    </div>
                @endif
        </div>
    </div>

<div class="text-white" style="">

</div>
@endsection
