@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
    <div class="subheader-text">Chapter History</div>
@endsection

@section("breadcrumbs")
    <div class="trail"><a href="/">Home</a> > <a href="/chapters">Chapters</a> > <strong>Chapter History</strong></div>
@endsection

@section("maincontent")

@php
    $json = "chapter-history.json";
@endphp
<form class="form ajax_form" id="new_chapter_application">
    <div class="container-fluid bg-black text-white p-0 m-0">
        <x-fields :json="$json" :formdata="$data" />
        <div class="row py-5 border-bottom">
            <div class="col-xl-3 mb-3 ps-4">
                <h4 class="m-start-4">Information Certification</h4>
            </div>
            <div class="col-xl-9 mb-3 pe-4 ps-4">
                <div class="fields_box row">
                    <H2>Information Certification</H2>
                    <p style='line-height: 2; margin-top: 20px;'>&emsp;&emsp;I hereby certify that all of the above entries are true and correct to the best of my knowledge. Any deliberate falsehood may subject me to disciplinary action by my chapter or by a higher authority within the Tau Gamma Phi Global leadership hierarchy.</p>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                <div class="">
                                    <button class="btn btn-dark btn-sm ajax_btn my-3" data-action="affix-signature" data-signbox="information_certification">Your Signature</button>
                                    <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="information_certification">
                                        <div class="signature" data-signbox="information_certification"></div>
                                        <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="information_certification" data-fieldgroup_name="information_certification" data-fieldgroup_id="0"></textarea>
                                    </div>
                                </div>
                                <div class="sign-box w-100">Applicant's Name</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                <div class="">

                                    <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="officer_1">
                                        <div class="signature" data-signbox="officer_1"></div>
                                        <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="officer_1" data-fieldgroup_name="officer_1" data-fieldgroup_id="0"></textarea>
                                    </div>
                                </div>
                                <div class="sign-box w-100">Name & Signature of Current Chapter Officer<button class="btn btn-dark btn-sm ajax_btn ms-4  my-3" data-action="affix-signature" data-signbox="officer_1">Officer Signature</button></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                <div class="">

                                    <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="officer_2">
                                        <div class="signature" data-signbox="officer_2"></div>
                                        <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="officer_2" data-fieldgroup_name="officer_2" data-fieldgroup_id="0"></textarea>
                                    </div>
                                </div>
                                <div class="sign-box w-100">Name & Signature of Current Chapter Officer<button class="btn btn-dark btn-sm ajax_btn ms-4  my-3" data-action="affix-signature" data-signbox="officer_2">Officer Signature</button></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                <div class="">

                                    <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="officer_3">
                                        <div class="signature" data-signbox="officer_3"></div>
                                        <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="officer_3" data-fieldgroup_name="officer_3" data-fieldgroup_id="0"></textarea>
                                    </div>
                                </div>
                                <div class="sign-box w-100">Name & Signature of Current Chapter Officer<button class="btn btn-dark btn-sm ajax_btn ms-4 my-3" data-action="affix-signature" data-signbox="officer_3">Officer Signature</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="d-flex justify-content-end px-3 pt-3 pb-5">
            <button class="btn btn-dark ajax_btn me-3" data-action="triskelion-registration-cancel" data-next_page="/triskelions">Cancel</button>
            <button class="btn btn-secondary ajax_btn" data-action="triskelion-registration-continue" data-next_page="/triskelions/triskelion-registration/step-2">Submit History</button>
        </div>
    </div>

</form>

@endsection
