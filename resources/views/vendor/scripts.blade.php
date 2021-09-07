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
                                            '<button type="button" class="btn btn-outline-warning" id="btnInvokeEditToppingModal-'+data+'"><i class="fas fa-edit"></i></button>'+
                                            '<button type="button" class="btn btn-outline-danger" id="btnDeleteTopping-'+data+'"><i class="fas fa-trash-alt"></i></button>'+
                                        '</div>'
                            return btnGroup;
                    }

                }
            ],

        });

    });
    // /CREATE TOPPINGS TABLE

    // ADD NEW TOPPING
    onclick_add_topping = () => {

        //Form payload
        let formData = new FormData($('#formTopping')[0]);

        //Vendor controller
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('vendor.add.topping') }}",
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function(){$('#btnAddTopping').attr('disabled','disabled');},
            success: function(data) {
                console.log('Success in add topping ajax.');
                $('#btnAddTopping').removeAttr('disabled','disabled');
                if(data['status'] == 'success')
                {
                    console.log('Success in add topping.');
                    location.reload();
                }
            },
            error: function(err) {
                console.log('Error in add topping ajax.');
                $('#btnAddTopping').removeAttr('disabled','disabled');
            }
        });
    }
    // /ADD NEW TOPPING
</script>