<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ice Cream Flavours-Vendor</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keyword" content="Ice Cream, Ice Cream Order, Chocolate, Topping">

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- / Bootstrap -->
    
    <!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- FontAwesome --> <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- LineAwesome --> <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- SweetAlert --> <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--CSS --> <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">

</head>
<body>
    {{-- Header --}}
    <header>
        <div class="container-fluid bg-dark px-4 py-2">
            <ul class="nav nav-pills justify-content-end">
                <li class="nav-item">
                    <button type="button" class="btn btn-dark"><i class="fas fa-sign-out-alt"></i></button>
                </li>
            </ul>
        </div>
    </header>
    {{-- /Header --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    {{-- Side Bar --}}
                    <div class="col-2 bg-dark bg-gradient bg-opacity-90 sidebar">
                        <ul class="nav flex-column mt-5">
                            <li class="nav-item active"><a class="nav-link" href="">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Orders</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Toppings</a></li>
                        </ul>
                    </div>
                    {{-- /Side Bar --}}

                    {{-- Content --}}
                    <div class="col-10">
                        @yield('content')
                    </div>
                    {{-- /Content --}}
                </div>
            </div>
        </div>
    </div>
    {{-- Footer --}}
    <footer class="bg-secondary bg-gradient text-center text-dark p-2">
        <div class="text-center">
            <a href="" class="text-dark m-2" style="font-size: 35px;"><i class="fab fa-whatsapp"></i></a>
            <a href="" class="text-dark m-2" style="font-size: 35px;"><i class="fab fa-facebook-square"></i></a>
            <a href="" class="text-dark m-2" style="font-size: 35px;"><i class="fab fa-linkedin"></i></a>
            <a href="" class="text-dark m-2" style="font-size: 35px;"><i class="fab fa-twitter-square"></i></a>
            <a href="" class="text-dark m-2" style="font-size: 35px;"><i class="fab fa-viber"></i></a>
        </div>
        Copyright &copy; 2021 @ IceCreamFavour
    </footer>
    {{-- /Footer --}}
</body>
</html>