<script type="text/javascript">

    // CREATE TOPPINGS TABLE
    let tableToppings = null;

    $(function(){
        tableToppings = $('#tableToppings').DataTable({
            processing: true,
            serverSide: true,
            order: [0, "asc"],
            ajax : {
                url: "{{ route('vendor.toppings.table') }}"
            },
            columns:
            [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'price',
                    name: 'price' 
                },
                {
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    searchable: false
                },
            ],

            columnDefs:
            [
                {
                    targets: 3,
                    render: function(data, type, row) {
                        let btnGroup = '<div class="btn-group">'+
                                            '<button type="button" class="btn btn-outline-warning" id="btnInvokeEditToppingModal-'+data+'" onclick="invokeEditToppingModal('+data+');"><i class="fas fa-edit"></i></button>'+
                                            '<button type="button" class="btn btn-outline-danger" id="btnDeleteTopping-'+data+'" onclick="deleteTopping('+data+');"><i class="fas fa-trash-alt"></i></button>'+
                                        '</div>';
                            return btnGroup;
                    }
                }
            ],
        });
    });
    // /CREATE TOPPINGS TABLE

    // CREATE NEW TOPPING
    onclickCreateTopping = () => {
        //Remove previous validation error messages
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();

        //Form payload
        let formData = new FormData($('#formTopping')[0]);

        //Vendor controller
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('vendor.create.topping') }}",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){$('#btnCreateTopping').attr('disabled','disabled');},
            success: function(data) {
                console.log('Success in create topping ajax');
                $('#btnCreateTopping').removeAttr('disabled','disabled');
                if(data['errors']) {
                    console.log('Errors on validating topping data');
                    $.each(data['errors'], function(key, value) {
                        $('#error-'+key).show();
                        $('#'+key).addClass('is-invalid');
                        $('#error-'+key).append('<strong>'+value+'</strong>');
                    });
                }
                else if(data['status'] == 'success')
                {
                    console.log('Success in create topping');
                    SwalDoneSuccess.fire({
                        title: 'Create!',
                        text: 'Topping created',
                    })
                    .then((result) => {
                        if(result.isConfirmed) {
                            tableToppings.draw();
                        }
                    });
                }
            },
            error: function(err) {
                console.log('Error in create topping ajax');
                $('#btnCreateTopping').removeAttr('disabled','disabled');
            }
        });
    }
    // /CREATE NEW TOPPING

    // GET DETAILS OF TOPPING TO EDIT MODAL
    invokeEditToppingModal = (toppingId) => {

        //Form Payload
        let formData = new FormData();
        formData.append('toppingId', toppingId);

        //Edit topping get details controller
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('vendor.edit.topping.details') }}",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){$('#btnInvokeEditToppingModal-'+toppingId).attr('disabled', 'disabled');},
            success: function(data) {
                console.log('Success in edit topping get details ajax');
                //If topping id not found
                if(data['status'] === 'invalid_id') {
                    console.log('Error in topping id validation');
                    $('#btnInvokeEditToppingModal-'+toppingId).removeAttr('disabled', 'disabled');
                    SwalInvalidIdError.fire()
                    .then((result) => {
                        if(result.isConfirmed) {
                            $('#modal-edit-topping').modal('hide');
                        }
                    });
                }
                //If topping found
                else if(data['status'] === 'success') {
                    console.log('Success in edit topping get details');
                    if(data['topping'] !== null) {
                        //Fill input values with current topping details
                        $('#toppingId').val(data['topping']['id']);
                        $('#toppingName').val(data['topping']['name']);
                        $('#toppingPrice').val(data['topping']['price']);
                        $('#modal-edit-topping').modal('show');
                        $('#btnInvokeEditToppingModal-'+toppingId).removeAttr('disabled', 'disabled');
                    }
                }
            },
            error: function(err) {
                console.log('Error in edit topping get details ajax');
                $('#btnInvokeEditToppingModal-'+toppingId).removeAttr('disabled', 'disabled');
                SwalSystemError.fire();
            }
        });
    }
    // /GET DETAILS OF TOPPING TO EDIT MODAL

    // EDIT TOPPING
    editTopping = () => {
        //Remove previous validation error messages
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();

        //Form payload
        let formData = new FormData($('#formEditTopping')[0]);

        //Edit topping controller
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('vendor.edit.topping') }}",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {$('#btnEditTopping').attr('disabled', 'disabled');},
            success: function(data){
                console.log('Success in edit topping ajax');
                $('#btnEditTopping').removeAttr('disabled', 'disabled');
                if(data['errors']) {
                    console.log('Errors in validating topping details');
                    $.each(data['errors'], function(key, value) {
                        $('#error-'+key).show();
                        $('#'+key).addClass('is-invalid');
                        $('#error-'+key).append('<strong>'+value+'</strong>');
                    });
                }
                else if(data['status'] === 'id_error') {
                    console.log('Error in validating topping id');
                    SwalInvalidIdError.fire();
                }
                else if(data['status'] === 'success') {
                    console.log('Success in edit topping');
                    SwalDoneSuccess.fire({
                        title: 'Updated!',
                        text: 'Topping details have been updated',
                    })
                    .then((result) => {
                        if(result.isConfirmed) {
                            $('#modal-edit-topping').modal('hide');
                            tableToppings.draw();
                        }
                    });
                }
            },
            error: function(err) {
                console.log('Error in edit topping ajax');
                $('#btnEditTopping').removeAttr('disabled', 'disabled');
                SwalSystemError.fire();
            }
        });
    }
    // /EDIT TOPPING

    // DELETE TOPPING
    deleteTopping = (toppingId) => {
        SwalQuestionDanger.fire({
            title: 'Are you sure?',
            text: 'You wont be able to revert this!',
            confirmButtonText: 'Yes, Delete it!',
        })
        .then((result) => {
            if(result.isConfirmed) {
                //Form payload
                let formData = new FormData();
                formData.append('toppingId', toppingId);

                //Delete topping controller
                $.ajax({
                    headers: {'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('vendor.delete.topping') }}",
                    type: 'post',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {$('#btnDeleteTopping-'+toppingId).attr('disabled', 'disabled');},
                    success: function(data) {
                        console.log('Success in delete topping ajax');
                        $('#btnDeleteTopping-'+toppingId).removeAttr('disabled', 'disabled');
                        if(data['status'] === 'id_error') {
                            console.log('Error in validating topping id');
                            SwalInvalidIdError.fire();
                        }
                        else if(data['status'] === 'success'){
                            console.log('Success in delete topping');
                            SwalDoneSuccess.fire({
                                title: 'Deleted!',
                                text: 'Topping has been deleted',
                            })
                            .then((result2) => {
                                if(result2.isConfirmed) {
                                    tableToppings.draw();
                                }
                            });
                        }
                    },
                    error: function(err) {
                        console.log('Error in delete topping ajax');
                        $('#btnDeleteTopping-'+toppingId).removeAttr('disabled', 'disabled');
                        SwalSystemError.fire();
                    }
                });
            }
            else {
                SwalNotificationWarningAutoClose.fire({
                    title: 'Cancelled!',
                    text: 'Topping has not been deleted',
                })
            }
        });
    }
    // /DELETE TOPPING

</script>