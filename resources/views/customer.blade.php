@extends('layouts.customer')

@section('content')
<script>
    $(document).ready(function ($) {
        $('#divToppings').hide();
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold text-center">Make Your Order</h3>
                    <form id="formOrder">
                        {{-- <div class="col-8 text-center">
                            <div class="row"> --}}
                                <div class="mt-3">
                                    <select name="orderType" id="orderType" class="form-control" onchange="onchange_order();">
                                        <option disabled hidden selected>Please Select Your Order Type</option>
                                        <option value="1">Plain Ice Cream</option>
                                        <option value="2">Ice Cream with Toppings</option>
                                    </select>
                                </div>
                                <div class="mt-3" id="divToppings">
                                    <label for="toppings[]" class="form-label">Choose your Toppings</label><br>
                                    @foreach ($toppings as $topping)
                                        <input type="checkbox" name="toppings[]" id="toppings" value="{{ $topping->name }}">  {{ $topping->name }} - {{ $topping->price }}LKR<br>
                                    @endforeach
                                </div>
                            {{-- </div>
                        </div> --}}
                    </form>
                    <div class="d-grid col-4 mx-auto mt-4 mb-4">
                        <button type="button"  class="btn btn-primary" id="btnPlaceOrder" onclick="onclick_place_order();">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mt-5" id="divOrderDetails">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Your Order Details</h5>
                            <p></p>
                            <button class="btn btn-primary mb-4" onclick="onclick_print_details();">Print</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-5">
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
