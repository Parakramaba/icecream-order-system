{{-- EDIT TOPPING --}}
<div class="modal fade" id="modal-edit-topping" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editToppingLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editToppingLabel">Edit Topping Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <form id="formEditTopping">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" class="form-control" id="toppingId" name="toppingId" readonly />
                            </div>
                            <div class="col-lg-6">
                                <label for="toppingName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="toppingName" name="toppingName" placeholder="Please enter the new topping name..." />
                                <span class="invalid-feedback" id="error-toppingName" role="alert"></span>
                            </div>
                            <div class="col-lg-6">
                                <label for="toppingPrice" class="form-label">Price</label>
                                <input type="text" class="form-control" id="toppingPrice" name="toppingPrice" placeholder="Please enter the new topping price..." />
                                <span class="invalid-feedback" id="error-toppingPrice" role="alert"></span>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline-primary" id="btnEditTopping" onclick="editTopping();">Apply Chnages</button>
            </div>
        </div>
    </div>
</div>
{{-- /EDIT TOPPING --}}