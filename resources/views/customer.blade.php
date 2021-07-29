@extends('layouts.layout')

@section('content')
<script>
    $(document).ready(function ($) {
        $('#divToppings').hide();
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-12 border">
            <h3 class="font-weight-bold">Make Your Order</h3>
            <form id="formOrder">
                <div class="mt-3">
                    <select name="orderType" id="orderType" class="form-control" onchange="onchange_order()">
                        <option disabled hidden selected>Plese Select Your Order Type</option>
                        <option value="plain">Plain IceCream</option>
                        <option value="with Toppings">IceCream with Toppings</option>
                    </select>
                </div>
                <div class="mt-3" id="divToppings">
                    <label for="toppings[]" class="form-label">Choose your Toppings</label><br>
                    @foreach ($toppings as $topping)
                        <input type="checkbox" name="toppings[]" id="toppings" value="{{ $topping->name }}">  {{ $topping->name }} - {{ $topping->price }}LKR<br>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary mt-4 mb-4" id="btnPlaceOrder" onclick="onclick_place_order();">Place Order</button>
            </form>
        </div>
        <div class="col-12 mt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Your Order Details</h5>
                        <p>You have just ordered plain ice cream</p>
                        <p>You have ordered ice cream with your favourite toppings </p>
                        <button class="btn btn-primary mb-4" onclick="onclick_print_details();">Print</button>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-5">
                    <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Final Price</h5>
                        <button class="btn btn-primary mb-4" onclick="onclick_print_price();">Print</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('customer.scripts')
</div>
@endsection
