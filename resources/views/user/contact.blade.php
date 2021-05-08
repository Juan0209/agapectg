@extends('layouts.guest')
@section('title', 'Contactanos')
@section('content')
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Contactanos</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">
            <div class="d-none d-sm-block mb-5 pb-4">
                <div id="map" style="height: 480px;"></div>
                <script>
                    function initMap() {
                        var uluru = {
                            lat: -25.363,
                            lng: 131.044
                        };
                        var grayStyles = [{
                            featureType: "all",
                            stylers: [{
                                saturation: -90
                            },
                                {
                                    lightness: 50
                                }
                            ]
                        },
                            {
                                elementType: 'labels.text.fill',
                                stylers: [{
                                    color: '#ccdee9'
                                }]
                            }
                        ];
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: 10.4,
                                lng: -75.5
                            },
                            zoom: 13,
                            /*styles: grayStyles,*/
                            scrollwheel: false
                        });
                    }
                </script>
                <script
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
                </script>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Ponte en Contacto</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="{{route('send.message')}}" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingrese su mensaje'"
                                    placeholder='Ingrese su mensaje'></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Ingrese su nombre'" placeholder='Ingrese su nombre'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Ingrese su correo electronico'" placeholder='Ingrese su correo electronico'>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Ingrese el asunto'" placeholder='Ingrese el asunto'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="number" id="number" type="number" onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Ingrese su numero de celular'" placeholder='Ingrese su numero de celular'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            {{--<input class="btn_3 button-contactForm" type="submit" id="submit-btn" name="submit-btn" value="Enviar Mensaje">--}}
                            <button class="btn_3 button-contactForm submit-btn" type="submit" id="btnsubmit">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Cartagena, Colombia.</h3>
                            <p>¡Proximamente nueva sede!</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+57 (123) 4567 890</h3>
                            <p>Lunes a Viernes de 9:00a.m. a 6:00p.m.</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>agape@gmail.com</h3>
                            <p>¡Envianos tu Consulta en Cualquier Momento!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
    <!-- Modal success -->
    <div class="modal fade" id="success" data-backdrop="static" data-keyboard="false" style="margin-top: 10%;" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmación de Correo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¡El correo ha sido enviado exitosamente! En un momento una de nuestras asesoras se comunicara contigo. Ademas, hemos enviado una copia a tu correo.
                </div>
                <div class="modal-footer">
                    <a href="{{route('contact')}}" type="button" class="btn btn-primary">Aceptar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal error -->
    <div class="modal fade" id="error" data-backdrop="static" data-keyboard="false" tabindex="-1" style="margin-top: 10%;" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Notificación de Error</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¡Vaya! Al parecer ha ocurrido un error. Por favor, vuelve a intentarlo.
                </div>
                <div class="modal-footer">
                    <a href="{{route('contact')}}" type="button" class="btn btn-primary">Volver a Intentar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
