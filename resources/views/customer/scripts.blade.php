<script type="text/javascript">

// Show and hide toppings list according to order type
onchange_order = () => {
    //Get the selected order type
    let  orderType = $('#orderType').val();

    if(orderType == 'with Toppings') {
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
        url: "{{ route('add.order') }}",
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function(){$('#btnPlaceOrder').attr('disabled','disabled');},
        success: function(data) {
            
        },
        error: function(err) {

        }

    });

}
// / CREATE NEW ORDER
</script>