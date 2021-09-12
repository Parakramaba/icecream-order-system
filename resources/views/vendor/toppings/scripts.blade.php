<script type="text/javascript">

    // CREATE TOPPINGS TABLE
    $(function(){
        let tableToppings = $('#tableToppings').DataTable({
            processiong: true,
            severSide: true,
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
                                            '<button type="button" class="btn btn-outline-warning" id="btnInvokeEditToppingModal-'+data+'" onclick="invokeEditToppingModal('+data+');" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit"><i class="fas fa-edit"></i></button>'+
                                            '<button type="button" class="btn btn-outline-danger" id="btnDeleteTopping-'+data+'"><i class="fas fa-trash-alt"></i></button>'+
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
                            location.reload();
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
        

    }
    // /GET DETAILS OF TOPPING TO EDIT MODAL
</script>