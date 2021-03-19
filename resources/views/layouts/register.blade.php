<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" style="margin-top: 50px;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #BB8FCE;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Registrarse</h5>
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
                                    <h3><img src="img/ÁGAPE_logo.png" width="350" height="350" alt="logo"></h3>
                                    <a type="button" href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#login" data-dismiss="modal" aria-label="Close">Iniciar Sesion</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="login_part_form">
                                <div class="login_part_form_iner">

                                    <form class="row contact_form" action="{{ route('register') }}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="col-md-12 form-group p_star">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nombre">
                                        </div>

                                        <div class="col-md-12 form-group p_star">
                                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" placeholder="Direccion">
                                        </div>

                                        <div class="col-md-12 form-group p_star">
                                            <input type="number" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Telefono">
                                        </div>

                                        <div class="col-md-12 form-group p_star">
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Correo">
                                            {!! $errors->first('email','<small style="color: red;">:message</small>') !!}
                                        </div>
                                        <div class="col-md-12 form-group p_star">
                                            <input type="password" class="form-control" id="password" name="password" value="" placeholder="Contraseña" min="8">
                                        </div>

                                        <div class="col-md-12 form-group p_star">
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="" placeholder="Confirme Contraseña" min="8">
                                            {!! $errors->first('password','<small style="color: red;">:message</small>') !!}
                                        </div>

                                        <div class="col-md-12 form-group p_star">
                                            <input type="hidden" class="form-control" id="rol" name="rol" value="user_client" >
                                        </div>

                                        <div class="col-md-12 form-group">

                                            <button type="submit" value="submit" class="btn_3">
                                                Registrar
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
