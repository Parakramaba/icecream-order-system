@extends('layouts.vendor')

@section('content')

<div class="container my-5">
    <div class="row">
        <div class="col-12 border">
            <div class="row">
                <h3 class="text-weight-bold pt-3">Add New Topping</h3>
                <form id="formTopping">
                    <div class="col mt-4">
                        <label for="toppingName">Name</label>
                        <input type="text" class="form-control" id="toppingName" name="toppingName" placeholder="Chocolate"/>
                    </div>
                    <div class="col mt-3">
                        <label for="toppingPrice">Price</label>
                        <input type="text" class="form-control" id="toppingPrice" name="toppingPrice" placeholder="50"/>
                    </div>
                    <button type="button" class="btn btn-primary mt-4 mb-4" id="btnAddTopping" onclick="onclick_add_topping();">Add Topping</button>
                </form>
            </div>
        </div>
        <div class="col-12 mt-5 border">
            <div class="row">
                <h3 class="text-weight-bold pt-3">Toppings</h3>
                <div class="px-2">
                    <table class="table table-striped px-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($toppings as $topping)
                                <tr>
                                    <td>{{ $topping->id }}</td>
                                    <td>{{ $topping->name }}</td>
                                    <td>{{ $topping->price }}LKR</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('vendor.scripts')
</div>
    
@endsection