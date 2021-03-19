@extends('layouts.guest')
@section('content')
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Facturar Pedido</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_padding">
        <div class="container">
<!--            <div class="returning_customer">
                <div class="check_title">
                    <h2>
                        Returning Customer?
                        <a href="#">Click here to login</a>
                    </h2>
                </div>
                <p>
                    If you have shopped with us before, please enter your details in the
                    boxes below. If you are a new customer, please proceed to the
                    Billing & Shipping section.
                </p>
                <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="name" name="name" value=" " />
                        <span class="placeholder" data-placeholder="Username or Email"></span>
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="password" class="form-control" id="password" name="password" value="" />
                        <span class="placeholder" data-placeholder="Password"></span>
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="btn_3">
                            log in
                        </button>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option" name="selector" />
                            <label for="f-option">Remember me</label>
                        </div>
                        <a class="lost_pass" href="#">Lost your password?</a>
                    </div>
                </form>
            </div>-->
            <div class="cupon_area">
                <div class="check_title">
                    <h2>
                        ¿Cuentas con un cupón de descuento?
                        <a href="#">¡Click aquí para solicitar uno!</a>
                    </h2>
                </div>
                <input type="text" placeholder="Ingresa el codigo del cupon" />
                <a class="tp_btn" href="#">Aplicar Cupón</a>
            </div>
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Detalles de Pago</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="first" name="name">
                                <span class="placeholder" data-placeholder="Nombres"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="last" name="name" />
                                <span class="placeholder" data-placeholder="Apellidos"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number" />
                                <span class="placeholder" data-placeholder="Número de celular"></span>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="email" name="compemailany" />
                                <span class="placeholder" data-placeholder="Correo Electronico"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add1" name="add1" >
                                <span class="placeholder" data-placeholder="Dirección Principal"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="add2" name="add2" />
                                <span class="placeholder" data-placeholder="Direccion Alternativa"></span>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city" />
                                <span class="placeholder" data-placeholder="Ciudad"></span>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Código Postal/ZIP" />
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <h3>Detalles de la compra</h3>
                                </div>
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="¿Quieres comunircar algo acerca de tu producto? adelante, escribelo aquí"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Tu Pedido</h2>
                            <ul class="list">
                                <li>
                                    <a href="#">Producto
                                        <span>Total</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Pozole de lavadero
                                        <span class="middle">x 02</span>
                                        <span class="last">$72.000</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Vomisqueta
                                        <span class="middle">x 02</span>
                                        <span class="last">$72.000</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Engrudo Art Atack
                                        <span class="middle">x 02</span>
                                        <span class="last">$72.0000</span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="list list_2">
                                <li>
                                    <a href="#">Subtotal
                                        <span>$216.000</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Descuento del Cupón
                                        <span>$50.000</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">Total
                                        <span>$165.000</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector" />
                                    <label for="f-option5">Pago contra-entrega</label>
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Se le enviara el producto a su resisdencia y usted lo pagara al recibirlo.
                                </p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector" />
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/single-product/card.jpg" alt="" />
                                    <div class="check"></div>
                                </div>
                                <p>
                                    Págue desde la comodidad de su casa y relajese, nosotros le avisamos cuando su pedido este en camino
                                </p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector" />
                                <label for="f-option4">He leido y acepto los </label>
                                <a href="#">Terminos y Condiciones</a>
                            </div>
                            <a class="btn_3" href="#">Continuar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection
