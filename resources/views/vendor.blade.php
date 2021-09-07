@extends('layouts.vendor')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-12 border rounded border-3">
            <h3 class="text-weight-bold pt-3">Add New Topping</h3>
            <form id="formTopping">
                <div class="row mt-4">
                    <div class="col-lg-6">
                        <label for="toppingName">Name</label>
                        <input type="text" class="form-control" id="toppingName" name="toppingName" placeholder="Please enter name..."/>
                    </div>
                    <div class="col-lg-6">
                        <label for="toppingPrice">Price</label>
                        <input type="text" class="form-control" id="toppingPrice" name="toppingPrice" placeholder="Please enter price..."/>
                    </div>
                </div>
            </form>
            <div class="d-grid col-md-4  mx-auto my-2">
                <button type="button" class="btn btn-primary mt-4 mb-4" id="btnAddTopping" onclick="onclick_add_topping();">Add Topping</button>
            </div>
        </div>
        <div class="col-12 mt-5 border rounded border-3">
            <div class="row">
                <h3 class="text-weight-bold pt-3">Toppings</h3>
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
    @include('vendor.scripts')
</div>
    
@endsection