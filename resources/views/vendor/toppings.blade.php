@extends('layouts.vendor')

@section('content')

    <script>
        // ACTIVE NAVIGATION ENTRY
        $(document).ready(function ($) {
            $('#toppings').addClass("active");
            $(document).attr("title", "Ice Cream Flavours | Vendor-Handling the toppings");
        });
    </script>
    {{-- CONTENT --}}
    <div class="container my-5">
        <div class="row">
            {{-- FORM ADD NEW TOPPING --}}
            <div class="col-12 border rounded border-3 px-4">
                <h3 class="text-weight-bold pt-3">Add New Topping</h3>
                <form id="formTopping">
                    <div class="row mt-4">
                        <div class="col-lg-6">
                            <label for="newToppingName">Name</label>
                            <input type="text" class="form-control" id="newToppingName" name="newToppingName" placeholder="Please enter topping name..." />
                            <span class="invalid-feedback" id="error-newToppingName" role="alert"></span>
                        </div>
                        <div class="col-lg-6">
                            <label for="newToppingPrice">Price</label>
                            <input type="text" class="form-control" id="newToppingPrice" name="newToppingPrice" placeholder="Please enter topping price..." />
                            <span class="invalid-feedback" id="error-newToppingPrice" role="alert"></span>
                        </div>
                    </div>
                </form>
                <div class="d-grid col-md-4  mx-auto my-2">
                    <button type="button" class="btn btn-outline-primary my-4" id="btnCreateTopping" onclick="onclickCreateTopping();">Add Topping</button>
                </div>
            </div>
            {{-- /FORM ADD NEW TOPPING --}}

            {{-- TABLE TOPPINGS --}}
            <div class="col-12 mt-5 border rounded border-3 px-4">
                <div class="row">
                    <h3 class="text-weight-bold py-3">Toppings</h3>
                    <div>
                        <table class="table" id="tableToppings">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($toppings as $topping)
                                    <tr>
                                        <td>{{ $topping->id }}</td>
                                        <td>{{ $topping->name }}</td>
                                        <td>{{ $topping->price }}LKR</td>
                                        <td>
                                            <div class="btn-group justify-content-center" role="group">
                                                <button type="button" class="btn btn-outline-warning" id="btnEditTopping"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-outline-danger" id="btnDeleteTopping"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- /TABLE TOPPINGS --}}
            @include('vendor.toppings.modal')
        </div>
    </div>
    {{-- /CONTENT --}}

    @include('vendor.toppings.scripts')

@endsection