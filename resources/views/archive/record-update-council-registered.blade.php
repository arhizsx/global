@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Registered Councils</div>
@endsection

@section("breadcrumbs")
<div class="trail"><a href="/">Home</a> > <a href="/record-update">Record Update</a> > <a href="/record-update/council/">Council</a> > <strong>Registered Councils</strong></div>
@endsection

@section("maincontent")

@if( \Auth::user()->serial_number != null || \Auth::user()->serial_number != "" )
<div class="row py-5 border-bottom text-white">
    <div class="col-xl-3 mb-3 ps-4">
        <h4 class="m-start-4">Registered Councils</h4>
        <small>Councils you registered in the system</small>
    </div>
    <div class="col-xl-9 mb-3 pe-4 ps-4">
        @if( count($data["councils"]) > 0 )
            @foreach($data["councils"] as $council)
            <div class="fields_box mb-3">

                <div class="row mb-3">
                    <div class="col-xl-12">
                        <label for="council_name">Council</label>
                        <input disabled value="{{ $council->council_name }}" name="council_name" type="text" class="form-control mb-3" placeholder="">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <label for="council_name">Council Category</label>
                        <input disabled value="{{ $council->council_type }}" name="council_name" type="text" class="form-control mb-3" placeholder="">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <label for="council_name">Date Founded</label>
                        <input disabled value="{{ $council->date_founded }}" name="council_name" type="date" class="form-control mb-3" placeholder="">
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <label for="council_name">Serial Number</label>
                        <input disabled value="{{ $council->council_serial_number }}" name="council_name" type="text" class="form-control mb-3" placeholder="">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <label for="council_name">Country</label>
                        <input disabled value="{{ $council->country }}" name="council_name" type="text" class="form-control mb-3" placeholder="">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <label for="council_name">Region</label>
                        <input disabled value="{{ $council->region }}" name="council_name" type="text" class="form-control mb-3" placeholder="">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <label for="council_name">Province</label>
                        <input disabled value="{{ $council->province }}" name="council_name" type="text" class="form-control mb-3" placeholder="">
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <label for="council_name">City</label>
                        <input disabled value="{{ $council->city }}" name="council_name" type="text" class="form-control mb-3" placeholder="">
                    </div>
                    <div class="col-xl-4">
                        <label for="council_name">Grand Triskelion</label>
                        <input value="" name="council_name" type="email" class="form-control mb-3" placeholder="">
                    </div>
                    <div class="col-xl-4">
                        <label for="council_name">Deputy Grand Triskelion</label>
                        <input value="" name="council_name" type="email" class="form-control mb-3" placeholder="">
                    </div>
                    <div class="col-xl-4">
                        <label for="council_name">Master Keeper of Scrolls</label>
                        <input value="" name="council_name" type="email" class="form-control mb-3" placeholder="">
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
                <div class="fields_box mb-3">

                <div class="col text-center">
                    <H5>No Approved Council</H5>
                    <small>Please wait for the approval of the council you registered</small>
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
