@extends('layouts.guest')
@section('title', 'Facturación')
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
            <div class="cupon_area">
                <div class="check_title">
                    <h2>
                        ¿Cuentas con un cupón de descuento?
                        <a href="#">¡Click aquí para consultar uno!</a>
                    </h2>
                </div>

            </div>
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cupon_area">
                            <input type="text" placeholder="Ingresa el codigo del cupon" />
                            <a class="tp_btn" href="#">Aplicar Cupón</a>
                        </div>

                        <form class="row contact_form" action="#{{--{{route('confirmation')}}--}}" {{--method="post"--}}>
                            @csrf

                            @if(isset($payed) and $payed == true)

                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>Destinatario Secundario (OPCIONAL)</h3>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name2" name="name2" placeholder="Nombres y apellidos del destinatario secundario" value="{{ old('name2') }}">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Numero de telefono del destinatario secundario" value="{{ old('phone2') }}">
                                    </div>

                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="add2" name="add2"placeholder="Direccion de Residencia del destinatario secundario" value="{{ old('add2') }}">
                                    </div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>Mensaje (OPCIONAL)</h3>
                                    </div>
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="¿Quieres agregarle un mensaje al destinatario? este mensaje sera anexado en la entrega del pedido." value="{{ old('messagge') }}"></textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>Detalles de Presentación (OPCIONAL)</h3>
                                    </div>
                                    <textarea class="form-control" name="details" id="details" rows="1" placeholder="¿Quieres darnos especificaciones sobre como quieres la presentacion de tu pedido? adelante, escribelo aquí. (Esto Puede Contener Costos Adicionales)" value="{{ old('details') }}"></textarea>
                                </div>

                            @elseif(!isset($payed))
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>Destinatario Secundario (OPCIONAL)</h3>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="name2" name="name2" placeholder="Nombres y apellidos del destinatario secundario" value="{{ old('name2') }}" disabled>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Numero de telefono del destinatario secundario" value="{{ old('phone2') }}" disabled>
                                    </div>

                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" id="add2" name="add2"placeholder="Direccion de Residencia del destinatario secundario" value="{{ old('add2') }}" disabled>
                                    </div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>Mensaje (OPCIONAL)</h3>
                                    </div>
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="¿Quieres agregarle un mensaje al destinatario? este mensaje sera anexado en la entrega del pedido." value="{{ old('messagge') }}" disabled></textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>Detalles de Presentación (OPCIONAL)</h3>
                                    </div>
                                    <textarea class="form-control" name="details" id="details" rows="1" placeholder="¿Quieres darnos especificaciones sobre como quieres la presentacion de tu pedido? adelante, escribelo aquí. (Esto Puede Contener Costos Adicionales)" value="{{ old('details') }}" disabled></textarea>
                                </div>
                            @endif

                            </div>
                            <div class="col-lg-4">
                                <div class="order_box">
                                    <h2>Tu Pedido</h2>
                                    <ul class="list">
                                        <li>
                                            <a><b>Producto</b>
                                                <span><b>Total</b></span>
                                            </a>
                                        </li>

                                        <?php $subtotal = 0 ?>
                                        @foreach($order as $product)
                                            <li>
                                                <?php $subtotal += $product->total ?>
                                                <a href="#">{{ $product->name }}
                                                    <span class="middle">x {{$product->quantity }} -</span>
                                                    <span class="last">$ {{ number_format($product->total) }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <?php   $domicilio = 10000 ;
                                            $descuento = 0 ;
                                            $tarifa = 0.0268;
                                            $totalbase = $subtotal + $domicilio - $descuento;
                                            $impuesto = $totalbase * $tarifa;
                                            $total = $totalbase + $impuesto;

                                    ?>

                                    <ul class="list list_2">
                                        <li>
                                            <a href="#">Subtotal
                                                <span>$ {{ number_format($subtotal) }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Costo de Domicilio
                                                <span>$ {{ number_format($domicilio)}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Cupón de Descuento
                                                <span>- $ {{number_format($descuento)}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Impuestos
                                                <span>$ {{number_format($impuesto)}}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Total
                                                <span>$ {{ number_format($total) }}</span>
                                            </a>
                                        </li>
                                        @if(!isset($payed))
                                        <li>
                                            <div class="text-center">
                                                <a href="#">
                                                    <form>
                                                        <?php
                                                        $key = '7fb5144e899c4c5051732c5ac0baaf2f' ;
                                                        $privateKey = '96d012f0a403671f4fb06bf2a7f6a704' ;
                                                        ?>
                                                        <script
                                                            src="https://checkout.epayco.co/checkout.js"
                                                            class="epayco-button"
                                                            data-epayco-key="{{$key}}"
                                                            data-epayco-private-key="{{$privateKey}}"
                                                            data-epayco-amount="{{$total}}"
                                                            data-epayco-tax-base="{{$totalbase}}"
                                                            data-epayco-tax="{{$impuesto}}"
                                                            data-epayco-name="ágape Design"
                                                            data-epayco-description="Tu Pedido ágape"
                                                            data-epayco-currency="cop"
                                                            data-epayco-country="co"
                                                            data-epayco-test="true"
                                                            data-epayco-external="false"
                                                            data-epayco-response="http://agapectg.test/payment/response"
                                                            {{--data-epayco-acepted="http://agapectg.test/payment/response"
                                                            data-epayco-rejected="http://agapectg.test/payment/response"
                                                            data-epayco-pending="http://agapectg.test/payment/response"
                                                            data-epayco-comfirmation="http://agapectg.test/payment/response"--}}
                                                            {{--data-epayco-email-billing="{{auth()->user()->email}}"
                                                            data-epayco-name-billing="{{auth()->user()->name}}"
                                                            data-epayco-address-billing="{{auth()->user()->address}}"
                                                            data-epayco-type-doc-billing="CC"
                                                            data-epayco-mobilephone-billing="{{auth()->user()->phone}}"--}}>
                                                        </script>
                                                    </form>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>

                                    <div class="text-center">

                                        <br><br>
                                        <input class="btn_1" type="button" onclick="mensaje('Para poder continuar es necesario que su Transaccion de pago haya sido exitosa.')" value="Continuar">
                                        <script>
                                            function mensaje(texto) {
                                                alert(texto);
                                            }
                                        </script>
                                    </div>
                                    @elseif(isset($payed) and $payed == true)
                                        </ul>

                                        <div class="text-center">

                                            <button type="submit" class="btn_1">Continuar</button>

                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @if($message != 0 and $message != '')
        <script>
            alert("{{$message}}");
        </script>
    @endif
<!--    ================End Checkout Area =================-->
@endsection
