<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Agape')</title>
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
@if( Auth::User()->rol == 'user_admin')
    @include('user.navAdmin')
    @yield('contentAdmin')
@else
    @include('user.navClient')
    @yield('contentClient')
@endif
<!-- Header part end-->



<!-- subscribe part end -->

<!--::footer_part start::-->
<footer class="footer_part">

    <div class="copyright_part" style="margin-top: 20px;">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="copyright_text">
                        <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <a href="{{route('products')}}"><img src="{{asset('img/logo_agapect.jpeg')}}" width="50" alt="#"></a> Agapect &copy;<script>document.write(new Date().getFullYear());</script> | Derechos reservados <i class="ti-heart" aria-hidden="true"></i> <a href="https://colorlib.com" target="_blank"></a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        <div class="col-lg-4">
                            <div class="social_icon">
                                <a href="https://www.facebook.com/agapectg" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.instagram.com/agapectg/" target="_blank"><i class="fab fa-instagram"></i></a>
                                {{--<a href="#"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>--}}
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









