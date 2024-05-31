<div class="modal fade" id="onload" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modallabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fdd700;">
                <h5 class="modal-title" id="modallabel">Chapter Check</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <label>Please enter the name of your Active Chapter</label>
                        <input type="text" class="form-control" id="active_chapter_check" name="active_chapter_check">
                        <i style="font-size: 0.7em; color: red;">* Please note that the exact name of the chapter is needed to proceed</i>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a button type="button" class="btn btn-sm btn-secondary" href="/triskelions">Cancel</a>
                <button type="button" class="btn btn-sm btn-dark ajax_btn" data-action="active_chapter_check">Confirm</button>
            </div>
        </div>
    </div>
</div>
