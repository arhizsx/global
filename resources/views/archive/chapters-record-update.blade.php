@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Chapter Update</div>
@endsection

@section("breadcrumbs")
<div class="trail"><a href="/">Home</a> > <a href="/chapters">Chapters</a> > <strong>Chapter Update</strong></div>
@endsection

@section("maincontent")


    @if( count($data["registered_chapters"]) > 0 &&  count($data["chapters"]) > 0)

        @if( \Auth::user()->serial_number != null || \Auth::user()->serial_number != "" )

            <div class="row py-5 border-bottom text-white">
                <div class="col-xl-3 mb-3 ps-4">
                    <H4>Update Chapter</H4>
                    <small>Chapters you are allowed to update in the system</small>
                </div>
                <div class="col-xl-9 mb-3 pe-4 ps-4">

                    @foreach($data["registered_chapters"] as $chapter)
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
                                <button class="btn btn-sm btn-dark px-3 py-1 show_modal" data-action="show_delegate_modal"><small>DELEGATE CHAPTER</small></button>
                                @endif
                                {{-- <button class="btn btn-sm btn-secondary px-3 py-1 ajax-btn me-2" data-action=""><small>MORE INFO</small></button> --}}
                            </div>
                        </div>
                    @endforeach

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
                                <a href="/chapters/record-update/{{ $chapter['chapter_id'] ?? '' }}" class="btn btn-sm btn-dark px-3 py-1 ajax-btn"><small>MANAGE CHAPTER</small></a>
                            </div>
                        </div>
                    @endforeach

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


    @elseif( count($data["registered_chapters"]) > 0 &&  count($data["chapters"]) == 0)

        @if( \Auth::user()->serial_number != null || \Auth::user()->serial_number != "" )

            <div class="row py-5 border-bottom text-white">
                <div class="col-xl-3 mb-3 ps-4">
                    <H4>Update Chapter</H4>
                    <small>Chapters you are allowed to update in the system</small>
                </div>
                <div class="col-xl-9 mb-3 pe-4 ps-4">

                    @foreach($data["registered_chapters"] as $chapter)
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
                                <button class="btn btn-sm btn-dark px-3 py-1 show_modal" data-action="show_delegate_modal"><small>DELEGATE CHAPTER</small></button>
                                @endif
                                {{-- <button class="btn btn-sm btn-secondary px-3 py-1 ajax-btn me-2" data-action=""><small>MORE INFO</small></button> --}}
                            </div>
                        </div>
                    @endforeach

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

    @elseif( count($data["registered_chapters"]) == 0 &&  count($data["chapters"]) > 1)

        @if( \Auth::user()->serial_number != null || \Auth::user()->serial_number != "" )

            <div class="row py-5 border-bottom text-white">
                <div class="col-xl-3 mb-3 ps-4">
                    <H4>Update Chapter</H4>
                    <small>Chapters you are allowed to update in the system</small>
                </div>
                <div class="col-xl-9 mb-3 pe-4 ps-4">

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
                                <a href="/chapters/record-update/{{ $chapter['chapter_id'] ?? '' }}" class="btn btn-sm btn-dark px-3 py-1 ajax-btn"><small>MANAGE CHAPTER</small></a>
                            </div>
                        </div>
                    @endforeach

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

    @elseif( count($data["registered_chapters"]) == 0 &&  count($data["chapters"]) == 1 )

        @php
            $json = "chapter-details-update.json";
        @endphp
        <form class="form ajax_update_form" id="chapter_details_update">
            <div class="container-fluid bg-black text-white p-0 m-0">
                <x-fields :json="$json" :formdata="$data" />
            </div>
        </form>
    @else


    <div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
            <svg class="bi me-2 mb-2 menu-item mb-5"><use xlink:href="#logo"></use></svg>
            <p>You don't have any chapter to update</p>

        </div>
    </div>

    @endif


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
