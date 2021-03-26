@extends('layouts.guest')
@section('title', 'Inicio')
@section('content')
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h2>ÁgapeDesign 🤍</h2>
                            <p>Somos dos amigas que aman diseñar y crear algo nuevo cada día. Porque creemos que regalar o darte algo personalizado, le añade el plus de ser algo único.</p>
                            <a href="{{ route('products') }}" class="btn_1">Explorar Catalogo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner_img">
            <img src="{{asset('storage/home/1.jpg')}}" width="90%" class="img-fluid">
            <img src="img/banner_pattern.png" alt="#" class="pattern_img img-fluid">
        </div>
    </section>

    <!-- product list start-->
    <section class="single_product_list">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="{{asset('storage/home/2.jpg')}}" class="img-fluid" alt="#">
                                    <img src="{{asset('img/product_overlay.png')}}" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>N.º 1</h5>
                                    <h2> <a href="{{route('products')}}">Ilustraciones</a></h2>
                                    <p>En ÁgapeDesign podemos convertir tu foto favorita y tus momentos más especiales en una hermosa ilustración.
                                        <br><br>
                                        El precio depende de la cantidad de personas que se encuentren en la foto.
                                        <br><br>
                                        ▪️Desde 25.000
                                    </p><br><br>
                                    <a href="{{route('products')}}" class="btn_3">Explorar más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="{{asset('storage/home/3.jpg')}}" class="img-fluid" alt="#">
                                    <img src="{{asset('img/product_overlay.png')}}" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>N.º 2</h5>
                                    <h2> <a href="{{route('products')}}">Mug clásico</a></h2>
                                    <p>¡Mereces un mug tan único y especial como tú!
                                        <br><br>
                                        ‑ 11 Oz.
                                        ‑ Material: cerámica.
                                        ‑ Se entrega en caja sellada.
                                        ‑ El precio incluye foto, y frase que la persona desee.
                                        <br><br>
                                        ▪️ Desde 25.000
                                        <br><br>
                                        Si deseas agregar más personas a la ilustración, podemos cotizarte.
                                    </p><br><br>
                                    <a href="{{route('products')}}" class="btn_3">Explorar más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="{{asset('storage/home/4.jpg')}}" class="img-fluid" alt="#">
                                    <img src="{{asset('img/product_overlay.png')}}" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>N.º 5</h5>
                                    <h2> <a href="{{route('products')}}">Cuadro 21 cm X 30 cm</a></h2>
                                    <p>¡La mejor manera para apreciar la ilustración!
                                        <br><br>
                                        ‑ Colores disponibles: blanco, café, y negro.
                                        <br><br>
                                        ▪️ Desde 48.000
                                        <br><br>
                                        Si deseas agregar más personas a la ilustración, podemos cotizarte.
                                    </p><br><br>
                                    <a href="{{route('products')}}" class="btn_3">Explorar más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="{{asset('storage/home/5.jpg')}}" class="img-fluid" alt="#">
                                    <img src="{{asset('img/product_overlay.png')}}" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>N.º 1</h5>
                                    <h2> <a href="{{route('products')}}">Portarretrato 13 cm X 18 cm</a></h2>
                                    <p>¡La mejor manera para apreciar la ilustración!
                                        <br><br>
                                        ‑ Colores disponibles: blanco, café, y negro.
                                        <br><br>
                                        ▪️ Desde 42.000
                                        <br><br>
                                        🎁 Si lo deseas entregar a manera de regalo, te ofrecemos un empaque, por el precio adicional de 4.000. Sólo válido para el portarretrato de 13 cm X 18 cm.
                                        <br><br>
                                        Si deseas agregar más personas a la ilustración, podemos cotizarte.
                                    </p><br><br>
                                    <a href="{{route('products')}}" class="btn_3">Explorar más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="{{asset('storage/home/6.jpg')}}" class="img-fluid" alt="#">
                                    <img src="{{asset('img/product_overlay.png')}}" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>N.º 1</h5>
                                    <h2> <a href="{{route('products')}}">Camisetas</a></h2>
                                    <p>¡Nadie había lucido tan cool!
                                        <br><br>
                                        ‑ Tela: Algodón.
                                        ‑ El diseño en la camiseta se hace bajo un proceso de estampado.
                                        ‑ Colores: blanco y negro.
                                        ‑ Se entrega en bolsa.

                                        <br><br>
                                        ▪️ Desde 45.000
                                        <br><br>
                                        Si deseas agregar más personas a la ilustración, podemos cotizarte.
                                    </p><br><br>
                                    <a href="{{route('products')}}" class="btn_3">Explorar más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="{{asset('storage/home/7.jpg')}}" class="img-fluid" alt="#">
                                    <img src="{{asset('img/product_overlay.png')}}" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>N.º 6</h5>
                                    <h2> <a href="{{route('products')}}">Para emprendedores</a></h2>
                                    <p>▫️Diseño de highlight.
                                        Dale un toque de originalidad, y coherencia a tu marca. Resalta entre todos los demás.
                                        <br><br>
                                        ▫️Ilustración de producto.
                                        Resalta todos los detalles de tu marca. No hace falta una sesión fotográfica para exponer todos tus productos de una manera divertida y original.
                                        <br><br>
                                        ▫️Diseño de patterns.
                                        ¿Qué es? Gráficos que se repiten en un orden específico.
                                        Los puedes usar en fondo, papel para envolturas, o para tu marca.
                                    </p><br><br>
                                    <a href="{{route('products')}}" class="btn_3">Explorar más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_product_iner">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <div class="single_product_img">
                                    <img src="{{asset('storage/home/8.jpg')}}" class="img-fluid" alt="#">
                                    <img src="{{asset('img/product_overlay.png')}}" alt="#" class="product_overlay img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-5 col-sm-6">
                                <div class="single_product_content">
                                    <h5>N.º 7</h5>
                                    <h2> <a href="{{route('products')}}">Grupos</a></h2>
                                    <p>▫¡Compartamos la experiencia en grupo!
                                        <br><br>
                                        ‑ Precio especial.
                                        ‑ Empaque especial.
                                        <br><br>
                                        Por la compra de 12 unidades en adelante, se te personaliza el empaque con la temática que gustes.
                                        <br><br>
                                        El detalle perfecto para tus eventos😍
                                    </p><br><br>
                                    <a href="{{route('products')}}" class="btn_3">Explorar más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
