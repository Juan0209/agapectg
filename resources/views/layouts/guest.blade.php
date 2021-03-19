<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agape | @yield('title')</title>
    <link rel="apple-touch-icon" sizes="180x180" href="img/faviconAgapect/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{ asset('img/faviconAgapect/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="img/faviconAgapect/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('css/all.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
</head>

<body>
<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{route('products')}}"> <img src="{{asset('img/ÁGAPE_logo1.png')}}" width="130" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('welcome.index')}}">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('products')}}">Productos</a>
                            </li>
                            @if(isset(Auth::User()->rol))
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown_3"
                                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Mis compras
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="{{ route('cart') }}">Lista del carrito</a>
                                        <a class="dropdown-item" href="{{ route('transaccion', 4) }}">Facturar pedido</a>
                                        <a class="dropdown-item" href="{{ route('confirmation') }}">confirmación</a>
                                    </div>
                                </li>
                                @if(Auth::User()->rol == 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('officials') }}">Funcionarios</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex align-items-center">
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                        <a href="{{ route('cart') }}">
                            <i class="flaticon-shopping-cart-black-shape"></i>
                        </a>

                        @if(isset(Auth::User()->rol))
                            <div class="dropdown">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                                    <li><a class="dropdown-item" href="#">Configuración</a></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="dropdown-item" type="submit">
                                                salir
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="#" data-toggle="modal" data-target="#login" title="Iniciar sesión">
                                <i class="fas fa-user-circle"></i>
                            </a>
                            <a href="#" style="color: #4B3049; font-size: 16px;font-family: 'Rubik', sans-serif; text-transform: capitalize; line-height: 16px; font-weight: 400;" data-toggle="modal" data-target="#login" title="Iniciar sesión">
                                &nbsp;Acceder
                            </a>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container ">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- Header part end-->

@yield('content')

<!-- subscribe part end -->

<!--::footer_part start::-->
<footer class="footer_part">
    <div class="copyright_part" style="margin-top: 20px;">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <a href="{{route('products')}}"><img src="{{asset('img/logo_agapect.jpeg')}}" height="50" width="50" alt="#"></a> Agapect &copy;<script>document.write(new Date().getFullYear());</script> | Derechos reservados <i class="ti-heart" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank"></a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        <div class="col-lg-4">
                            <div class="social_icon">
                                <a href="https://www.facebook.com/agapectg" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/agapectg/" target="_blank"><i class="fab fa-instagram"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@include('layouts.login')
@include('layouts.register')
<!--::footer_part end::-->

<!-- jquery plugins here-->
<script src="{{asset('js/jquery-1.12.1.min.js')}}"></script>
<!-- popper js -->
<script src="{{asset('js/popper.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- magnific popup js -->
<script src="{{asset('js/jquery.magnific-popup.js')}}"></script>
<!-- swiper js -->
<script src="{{asset('js/swiper.min.js')}}"></script>
<!-- swiper js -->
<script src="{{asset('js/mixitup.min.js')}}"></script>
<!-- carousel js -->
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
<!-- slick js -->
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('js/waypoints.min.js')}}"></script>
<script src="{{asset('js/contact.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<!-- custom js -->
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>
</body>

</html>
