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

        <x-fields :json="$json" />

        <div class="row py-5 border-bottom">
            <div class="col-xl-3 mb-3 ps-4">
                <h4 class="m-start-4">Oath of Allegiance</h4>
                <small>Chapter where you are currently active</small>
            </div>
            <div class="col-xl-9 mb-3 pe-4 ps-4">
                <div class="fields_box row">
                    <H2>Oath of Allegiance</H2>
                    <p style='line-height: 2; margin-top: 20px;'>&emsp;&emsp;I solemnly swear that I will bear true faith and allegiance to the Tenets and Code of Conduct, and to the Global Constitution, of the Tau Gamma Phi, that I will abide by the authority, policies and decisions of the Tau Gamma Phi leadership hierarchy, that I will give due respect and honor to the Founding Fathers and to my brother Triskelions, and that I shall never commit any act or omission that will cause dishonor to the Tau Gamma Phi.</p>
                    <p>So help me God.</p>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                <div class="">
                                    <button class="btn btn-dark btn-sm ajax_btn my-3" data-action="affix-signature" data-signbox="oath_of_allegiance">Your Signature</button>
                                    <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="oath_of_allegiance">
                                        <div class="signature" data-signbox="oath_of_allegiance"></div>
                                        <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="oath_of_allegiance" data-fieldgroup_name="oath_of_allegiance" data-fieldgroup_id="0"></textarea>
                                    </div>
                                </div>
                                <div class="sign-box w-100">Applicant's Name</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

