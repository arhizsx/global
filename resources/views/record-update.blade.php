@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Record Update</div>
@endsection

@section("maincontent")
<div class="row py-5 border-bottom text-white">
        <div class="col-xl-3 mb-3 ps-4">
            <h4 class="m-start-4">My Chapters</h4>
            <small>Chapters you registered or has been delegated with edit rights</small>
        </div>
        <div class="col-xl-9 mb-3 pe-4 ps-4">
            <div class="fields_box">
                @php
                    $chapters = \DB::table("chapters")
                                ->where("user_id", 2)
                                ->whereNotNull("chapter_serial_number")
                                ->get();
                @endphp
                @if( count($chapters) > 0 )
                    @foreach($chapters as $chapter)
                        <div class="row mb-3">
                            <div class="col-xl-12">
                                <label for="chapter_name">Chapter</label>
                                <input disabled value="{{ $chapter->chapter_name }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label for="chapter_name">Chapter Category</label>
                                <input disabled value="{{ $chapter->chapter_type }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label for="chapter_name">Date Founded</label>
                                <input disabled value="{{ $chapter->date_founded }}" name="chapter_name" type="date" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label for="chapter_name">Serial Number</label>
                                <input disabled value="{{ $chapter->chapter_serial_number }}" name="chapter_name" type="text" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label for="chapter_name">Grand Triskelion</label>
                                <input value="" name="chapter_name" type="email" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label for="chapter_name">Deputy Grand Triskelion</label>
                                <input value="" name="chapter_name" type="email" class="form-control mb-3" placeholder="">
                            </div>
                            <div class="col-xl-4">
                                <label for="chapter_name">Master Keeper of Scrolls</label>
                                <input value="" name="chapter_name" type="email" class="form-control mb-3" placeholder="">
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <button class="btn btn-sm btn-dark px-3 py-1 ajax-btn" data-action=""><small>SET GRAND COUNCIL</small></button>
                            <button class="btn btn-sm btn-secondary px-3 py-1 ajax-btn me-2" data-action=""><small>MORE INFO</small></button>
                        </div>

                    @endforeach
                @else
                    <div class="row">
                        <div class="col text-center">
                            No Approved Chapter to Update
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

<div class="text-white" style="">

</div>
@endsection
