<script type="text/javascript">

// Show and hide toppings list according to order type
onchange_order = () => {
    //Get the selected order type
    let  orderType = $('#orderType').val();

    if(orderType == '2') {
        $('#divToppings').show();
    }

    else {
        $('#divToppings').hide();
    }
}

// CREATE NEW ORDER
onclick_place_order = () => {

    //Form payload
    let formData = new FormData($('#formOrder')[0])

    //Customer controller
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('place.order') }}",
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function(){$('#btnPlaceOrder').attr('disabled','disabled');},
        success: function(data) {
            console.log('Success in place order ajax.');
            $('#btnPlaceOrder').removeAttr('disabled','disabled');
            if(data['status'] == 'success'){
                console.log('Success in place order.');
                //$("#formOrder").load(location.href + " #formOrder");
                // if(data['order']['toppings'] == null)
                // {

                // }
            }
        },
        error: function(err) {
            console.log('Error in place order ajax.');
            $('#btnPlaceOrder').removeAttr('disabled','disabled');
        }

    });

}
// / CREATE NEW ORDER
</script>