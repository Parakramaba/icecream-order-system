@extends('layouts.customer')

@section('content')
<script>
    $(document).ready(function ($) {
        $('#divToppings').hide();
        $('#divOrderDetails').hide();
    });
</script>
<div class="container py-5">
    <div class="row">
        {{-- ORDER FORM --}}
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold text-center">Make Your Order</h3>
                    <form id="formOrder" class="border rounded border-3 p-4">
                        <div class="row">
                            <div class="col-md-6 form-group mt-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Please enter your first name..." />
                                <span class="invalid-feedback" id="error-firstName" role="alert"></span>
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Please enter your last name..." />
                                <span class="invalid-feedback" id="error-lastName" role="alert"></span>
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label for="telNo" class="form-label">Telephone Number</label>
                                <input type="text" class="form-control" id="telNo" name="telNo" placeholder="ex: 718898123" />
                                <span class="invalid-feedback" id="error-telNo" role="alert"></span>
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label for="orderType" class="form-label">Order Type</label>
                                <select name="orderType" id="orderType" class="form-control" onchange="onchange_order();">
                                    <option disabled hidden selected>Please Select Your Order Type</option>
                                    <option value="1">Normal Ice Cream</option>
                                    <option value="2">Ice Cream with Toppings</option>
                                </select>
                                <span class="invalid-feedback" id="error-orderType" role="alert"></span>
                            </div>
                            <div class="col-12 mt-4" id="divToppings">
                                <h5>Please Select your toppings</h5>
                                <div class="row mt-3">
                                    @foreach ($toppings as $topping)
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <input type="checkbox" class="" name="toppings[]" value="{{ $topping->name }}"> {{ $topping->name }} ({{ $topping->price }}LKR)
                                    </div>
                                    @endforeach
                                </div>
                                {{-- <span class="invalid-feedback" id="error-toppings" role="alert"></span> --}}
                            </div>
                        </div>
                    </form>
                    <div class="d-grid col-4 mx-auto my-4">
                        <button type="button"  class="btn btn-primary" id="btnPlaceOrder" onclick="onclick_place_order();">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- /ORDER FORM --}}

        {{-- ORDER DETAILS --}}
        <div class="col-12 mt-5" id="divOrderDetails">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold text-center">Your Order Details</h3>
                    <div class="border rounded border-3 w-100 p-4">
                        <table class="table" id="tblOrderDetails" >
                            <tr>
                                <th>Name: </th>
                                <td><span id="spanName"></span></td>
                            </tr>
                            <tr>
                                <th>Telephone Number: </th>
                                <td><span id="spanTel"></span></td>
                            </tr>
                            <tr>
                                <th>Order Type: </th>
                                <td><span id="spanOrderType"></span></td>
                            </tr>
                            <tr id="trAddedToppings">
                                <th>Added Toppings: </th>
                                <td>
                                    <div class="col-12">
                                        <div class="row" id="divAddedToppings">
                                            <div></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Total Price: </th>
                                <td><span id="spanPrice"></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-grid col-4 mx-auto my-4">
                        <button class="btn btn-primary" id="btnPrintDetails">Print</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- /ORDER DETAILS --}}

        {{-- <div class="col-12 mt-5" id="divOrderDetails">
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
        </div> --}}
    </div>
    @include('customer.scripts')
</div>
@endsection
