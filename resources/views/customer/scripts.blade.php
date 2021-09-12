<script type="text/javascript">

// SHOW AND HIDE TOPPINGS LIST ACCORDING TO ORDER TYPE
onchangeOrder = () => {
    //Get the selected order type
    let  orderType = $('#orderType').val();

    if(orderType == '2') {
        $('#divToppings').show();
    }

    else {
        $('#divToppings').hide();
    }
}
// /SHOW AND HIDE TOPPINGS LIST ACCORDING TO ORDER TYPE

// CREATE NEW ORDER
onclickPlaceOrder = () => {
    // Remove previous validation error messages
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').html('');
    $('.invalid-feedback').hide();

    // Form payload
    let formData = new FormData($('#formOrder')[0]);

    // Customer controller
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "{{ route('place.order') }}",
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: function(){$('#btnPlaceOrder').attr('disabled','disabled');},
        success: function(data) {
            console.log('Success in place order ajax');
            $('#btnPlaceOrder').removeAttr('disabled','disabled');
            // Form input validation
            if(data['errors']) {
                console.log('Errors on validating order data')
                $.each(data['errors'], function(key, value){
                    $('#error-'+key).show();
                    $('#'+key).addClass('is-invalid');
                    $('#error-'+key).append('<strong>'+value+'</strong>');
                });
            }
            // Topping selecting validation
            else if(data['status'] == 'topping_error' || data['status'] == 'invalid_topping') {
                console.log('Errors in selecting toppings');
                SwalError.fire({
                    title: 'Error!',
                    text: data['msg'],
                })
            }
            // Success
            else if(data['status'] === 'success'){
                console.log('Success in place order');
                SwalDoneSuccess.fire({
                    title: 'Order Placed!',
                    text: 'Your order has been placed',
                })
                .then((result) => {
                    if(result.isConfirmed) {
                        // Reset the form
                        $('#formOrder').trigger('reset');
                        $('#divToppings').hide();

                        // Fetch order details to order details card,then show
                        // Fill full name according to last name
                        if(data['order']['last_name'] === null) {
                            $('#spanName').html(data['order']['first_name']);
                        }
                        else {
                            $('#spanName').html(data['order']['first_name'] + ' ' + data['order']['last_name']);
                        }

                        $('#spanTel').html(data['order']['telephone']);
                        // Fill relevent toppings details
                        if(data['order']['type'] == '1' && data['order']['toppings'] == null) {
                            $('#spanOrderType').html('Normal Ice Cream');
                            $('#trAddedToppings').hide();
                        }
                        else if(data['order']['type'] == '2' && data['order']['toppings'] != null) {
                            $('#spanOrderType').html('Ice Cream with Toppings');
                            // Remove previous toppings and add newly selected toppings
                            $('#divAddedToppings').find('div').remove();
                            $.each(data['order']['toppings'], function(key, value) {
                                $('#divAddedToppings').append("<div class='col-lg-4 col-md-6'><li>"+value+"</li></div>");
                            });
                            $('#trAddedToppings').show();
                        }
                        $('#spanPrice').html(data['totalPrice']+'LKR');
                        $('#divOrderDetails').show();
                    }
                });
            }
        },
        error: function(err) {
            console.log('Error in place order ajax');
            $('#btnPlaceOrder').removeAttr('disabled','disabled');
        }
    });
}
// /CREATE NEW ORDER
</script>