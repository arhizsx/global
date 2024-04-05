@extends('layout')

@section("logo")
    <svg class="bi me-2" width="70" height="70"><use xlink:href="#logo"></use></svg>
@endsection

@section("subheader")
<div class="subheader-text">Council Registration</div>
@endsection

@section("breadcrumbs")
    <div class="trail"><a href="/">Home</a> > <a href="/councils">Councils</a> > <strong>Council Registration</strong></div>

@endsection

@section("maincontent")


    @if( \Auth::user()->serial_number != null|| \Auth::user()->serial_number != "" )

        @php
            $json = "council-registration.json";


        @endphp
        <form class="form ajax_form" id="council_registration">
            <div class="container-fluid bg-black text-white p-0 m-0">

                <x-fields :json="$json" :formdata="$data" />

                <div class="row py-5 border-bottom">
                    <div class="col-xl-3 mb-3 ps-4">
                        <h4 class="m-start-4">Council Pledge of Solidarity</h4>
                    </div>
                    <div class="col-xl-9 mb-3 pe-4 ps-4">
                        <div class="fields_box row">
                            <H2>Council Pledge of Solidarity</H2>
                            <p style='line-height: 2; margin-top: 20px;'>&emsp;&emsp;By the power vested in us as the duly elected officers of the Grand Council of DSADA Council, we solemnly bind the Council and its members to bear true faith and allegiance to the Tenets and Code of Conduct, and to the Global Constitution, of the Tau Gamma Phi, and we solemnly swear to support and abide by the authority, policies and decisions of the Tau Gamma Phi Global leadership hierarchy.</p>
                            <p>&emsp;&emsp;So help me God.</p>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                        <div class="">

                                            <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="gt">
                                                <div class="signature" data-signbox="gt"></div>
                                                <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="gt" data-fieldgroup_name="gt" data-fieldgroup_id="0"></textarea>
                                            </div>
                                        </div>
                                        <div class="sign-box w-100">Name & Signature of Current Chapter Officer<button class="btn btn-dark btn-sm ajax_btn ms-4  my-3" data-action="affix-signature" data-signbox="gt">GT Signature</button></div>
                                    </div>
                                    <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                        <div class="">

                                            <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="dgt">
                                                <div class="signature" data-signbox="dgt"></div>
                                                <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="dgt" data-fieldgroup_name="dgt" data-fieldgroup_id="0"></textarea>
                                            </div>
                                        </div>
                                        <div class="sign-box w-100">Name & Signature of Current Chapter Officer<button class="btn btn-dark btn-sm ajax_btn ms-4  my-3" data-action="affix-signature" data-signbox="dgt">DGT Signature</button></div>
                                    </div>
                                    <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                        <div class="">

                                            <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="mks">
                                                <div class="signature" data-signbox="mks"></div>
                                                <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="mks" data-fieldgroup_name="mks" data-fieldgroup_id="0"></textarea>
                                            </div>
                                        </div>
                                        <div class="sign-box w-100">Name & Signature of Current Chapter Officer<button class="btn btn-dark btn-sm ajax_btn ms-4 my-3" data-action="affix-signature" data-signbox="mks">MKS Signature</button></div>
                                    </div>
                                    <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                        <div class="">

                                            <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="mkc">
                                                <div class="signature" data-signbox="mkc"></div>
                                                <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="mkc" data-fieldgroup_name="mkc" data-fieldgroup_id="0"></textarea>
                                            </div>
                                        </div>
                                        <div class="sign-box w-100">Name & Signature of Current Chapter Officer<button class="btn btn-dark btn-sm ajax_btn ms-4 my-3" data-action="affix-signature" data-signbox="mkc">MKC Signature</button></div>
                                    </div>
                                    <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                        <div class="">

                                            <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="mwww">
                                                <div class="signature" data-signbox="mwww"></div>
                                                <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="mwww" data-fieldgroup_name="mwww" data-fieldgroup_id="0"></textarea>
                                            </div>
                                        </div>
                                        <div class="sign-box w-100">Name & Signature of Current Chapter Officer<button class="btn btn-dark btn-sm ajax_btn ms-4 my-3" data-action="affix-signature" data-signbox="mwww">MWW Signature</button></div>
                                    </div>
                                    <div class="col-xl-12 row text-center d-flex justify-content-center align-items-end mb-3" style="min-height: 120px;">
                                        <div class="">

                                            <div class="signature_box d-flex d-none justify-content-center w-100"  data-signbox="mi">
                                                <div class="signature" data-signbox="mi"></div>
                                                <textarea class="form-control field_monitor_multi d-none" name="signature[]" data-signbox="mi" data-fieldgroup_name="mi" data-fieldgroup_id="0"></textarea>
                                            </div>
                                        </div>
                                        <div class="sign-box w-100">Name & Signature of Current Chapter Officer<button class="btn btn-dark btn-sm ajax_btn ms-4 my-3" data-action="affix-signature" data-signbox="mi">MI Signature</button></div>
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
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="container-fluid">
                <div class="d-flex justify-content-end px-3 pt-3 pb-5">
                    <button class="btn btn-dark ajax_btn me-3" data-action="chapter-registration-cancel" data-next_page="/chapters">Cancel</button>
                    <button class="btn btn-secondary ajax_btn" data-action="triskelion-registration-continue" data-next_page="/triskelions/triskelion-registration/step-2">Register Council</button>
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


    @else

        <div class="row justify-content-center min-vh-100 bg-black" style="padding-top: 100px;">
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 text-center text-white mb-3">
                <svg class="bi me-2 mb-2 menu-item mb-5"><use xlink:href="#logo"></use></svg>
                <p>Please wait for your account to be verified before accessing this section</p>
            </div>
        </div>

    @endif


@endsection
