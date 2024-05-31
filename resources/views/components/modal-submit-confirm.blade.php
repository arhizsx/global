<div class="modal fade" id="confirm_registration" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fdd700;">
                <h5 class="modal-title" id="modallabel">{{ $title }}</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        Are you sure that all the information you provided are correct and want to submit this?
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-dark ajax_btn" data-action="{{ $action }}">Confirm</button>
            </div>
        </div>
    </div>
</div>
