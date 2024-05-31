<div class="modal fade" id="onload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fdd700;">
                <h5 class="modal-title" id="modallabel">{{ $title }}</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        You have a pending registration that is currently being reviewed, please wait while we validate your information.
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a button type="button" class="btn btn-sm btn-secondary" href="{{ $backlink }}">Close</a>
            </div>
        </div>
    </div>
</div>
