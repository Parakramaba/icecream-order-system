@extends('layouts.vendor')

@section('content')

<script>
    // ACTIVE NAVIGATION ENTRY
    $(document).ready(function ($) {
        $('#toppings').addClass("active");
        $(document).attr("title", "Ice Cream Flavours | Vendor-Handling the toppings");
    });
</script>

<div class="container my-5">
    <div class="row">
        <div class="col-12 border rounded border-3">
            <h3 class="text-weight-bold pt-3">Add New Topping</h3>
            <form id="formTopping">
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <label for="toppingName">Name</label>
                        <input type="text" class="form-control" id="toppingName" name="toppingName" placeholder="Please enter name..." />
                        <span class="invalid-feedback" id="error-toppingName" role="alert"></span>
                    </div>
                    <div class="col-lg-6">
                        <label for="toppingPrice">Price</label>
                        <input type="text" class="form-control" id="toppingPrice" name="toppingPrice" placeholder="Please enter price..." />
                        <span class="invalid-feedback" id="error-toppingPrice" role="alert"></span>
                    </div>
                </div>
            </form>
            <div class="d-grid col-md-4  mx-auto my-2">
                <button type="button" class="btn btn-outline-primary my-4" id="btnCreateTopping" onclick="onclickCreateTopping();">Add Topping</button>
            </div>
        </div>
        <div class="col-12 mt-5 border rounded border-3">
            <div class="row">
                <h3 class="text-weight-bold py-3">Toppings</h3>
                <div class="px-3">
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
    </div>
    @include('vendor.toppings.scripts')
</div>
    
@endsection