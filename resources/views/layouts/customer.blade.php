<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ice Cream Flavours-Order</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keyword" content="Ice Cream, Ice Cream Order, Chocolate, Topping">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- / Bootstrap -->
    
    <!-- jQuery --> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- FontAwesome --> <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!-- SweetAlert --> <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS --> <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    
</head>

<body>
    <div class="bg-dark bg-gradient">
        {{-- Header --}}
        <header>
            <div class="container">
                <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mt-2">
                        <a class="nav-link bg-dark text-light text-uppercase" href="{{ route('vendor.home') }}"><i class="fas fa-user"></i> Vendor Sign In</a>
                    </li>
                </ul>
                <div class="justify-content-center mt-2">
                    <div class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ url('img/header-1.jpg') }}" class="d-block w-100" alt="Ice Cream 1" />
                            </div>
                            <div class="carousel-item">
                                <img src="{{ url('img/header-2.jpg') }}" class="d-block w-100" alt="Ice Cream 2" />
                            </div>
                            <div class="carousel-item">
                                <img src="{{ url('img/header-3.jpg') }}" class="d-block w-100" alt="Ice Cream 3" />
                            </div>
                            <div class="carousel-item">
                                <img src="{{ url('img/header-4.jpg') }}" class="d-block w-100" alt="Ice Cream 4" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        {{-- /Header --}}

        {{-- Content --}}
        <div>
            @yield('content')
        </div>
        {{-- /Content --}}
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
        Copyright &copy; 2021 @ IceCreamFavours
    </footer>
    {{-- /Footer --}}
</body>
</html>