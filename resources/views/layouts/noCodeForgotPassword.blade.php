<!-- Modal -->
<div class="modal fade" id="codeForgotPassword" tabindex="-1" style="margin-top: 100px;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #BB8FCE;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Recuperación de Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="login_part_text text-center">
                                <div class="login_part_text_iner">
                                    <h3><img src="{{asset('img/ÁGAPE_logo.png')}}" width="280" height="240" alt="logo"></h3>
                                    <a type="button" href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#register" data-dismiss="modal" aria-label="Close">Registrarse</a>
                                    <a type="button" href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#login" data-dismiss="modal" aria-label="Close">Iniciar Sesion</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="login_part_form">
                                <div class="login_part_form_iner">
                                    <h3>El Codigo Suministrado es Incorrecto</h3>
                                    <p>Por favor, introduce nuevamente el codigo de seguridad que hemos enviado a tu correo.</p>
                                    <form class="row contact_form" action="{{ route('validateCode') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="col-md-12 form-group p_star">
                                            <input type="hidden" name="code" value="{{$codigo}}">
                                            <input type="hidden" name="email" value="{{$to}}">
                                            <input type="text" class="form-control" id="code2" name="code2" value="{{ old('code') }}" placeholder="Codigo de Seguridad">
                                        </div>
                                        <div class="col-md-12 form-group text-center">
                                            <button type="submit" value="submit" class="btn_3">
                                                Verificar Codigo
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
