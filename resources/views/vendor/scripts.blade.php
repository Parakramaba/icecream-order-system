<script type="text/javascript">

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
    // / ADD NEW TOPPING
</script>