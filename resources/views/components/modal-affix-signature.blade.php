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
