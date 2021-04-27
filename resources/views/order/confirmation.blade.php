@extends('layouts.guest')
@section('title', 'Confirmación')
@section('content')
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>confirmación</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================ confirmation part start =================-->
    <section class="confirmation_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="confirmation_tittle">
                        <span><h3>¡Gracias! Recibimos tu pedido.</h3></span>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Pedido</h4>
                        <ul>
                            <li>
                                <p>Número de factura</p><span>: {{$bill[0]->id}}</span>
                            </li>
                            <li>
                                <p>Fecha</p><span>: {{$bill[0]->updated_at}}</span>
                            </li>
                            <li>
                                <p>Total (COP)</p><span>: $ {{number_format($bill[0]->total_price)}}</span>
                            </li>
                            <li>
                                <p>Metodo de Pago</p><span>: ePayco</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Destinatario Secundario</h4>
                        <ul>
                            <li>
                                <p>Nombre</p><span>: {{$bill[0]->name2}}</span>
                            </li>
                            <li>
                                <p>direccion</p><span>: {{$bill[0]->add2}}</span>
                            </li>
                            <li>
                                <p>Celular</p><span>: {{ substr($bill[0]->phone2,0,3) }} {{substr($bill[0]->phone2,3 )}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Destinatario</h4>
                        <ul>
                            <li>
                                <p>Nombre</p><span>: {{auth()->user()->name}}</span>
                            </li>
                            <li>
                                <p>Dirección</p><span>: {{auth()->user()->address}}</span>
                            </li>
                            <li>
                                <p>Celular</p><span>: {{ substr(auth()->user()->phone,0,3) }} {{substr(auth()->user()->phone,3 )}}</span>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Soporte de ágape</h4>
                        <ul>
                            <li>
                                <p>Dirección de Correo</p><span>: agape@gmail.com</span>
                            </li>
                            <li>
                                <p>Celular y Whatsapp</p><span>: 320 5195817</span>
                            </li>
                            <li>
                                <span>: 101 1101001</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="order_details_iner">
                        <h3>Detalles de Facturación</h3>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="2">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php $subtotal = 0 ?>
                            @foreach($order as $product)
                                <?php $subtotal += $product->total ?>
                                <tr>
                                    <th colspan="2"><span>{{ $product->name }}</span></th>
                                    <th>x{{$product->quantity }}</th>
                                    <th> <span>$ {{ number_format($product->total) }}</span></th>
                                </tr>
                            @endforeach

                            <?php
                            $domicilio = 10000 ;
                            $descuento = 0 ;
                            $tarifa = 0.0268;
                            $totalbase = $subtotal + $domicilio - $descuento;
                            $impuesto = $totalbase * $tarifa;
                            $total = $totalbase + $impuesto;
                            ?>

                            <tr>
                                <th colspan="3">Subtotal</th>
                                <th> <span>$ {{ number_format($subtotal) }}</span></th>
                            </tr>
                            <tr>
                                <th colspan="3">Costo de domicilio</th>
                                <th><span>$ {{ number_format($domicilio)}}</span></th>
                            </tr>
                            <tr>
                                <th colspan="3">Cupón de descuento</th>
                                <th><span>-$ {{number_format($descuento)}}</span></th>
                            </tr>
                            <tr>
                                <th colspan="3">Impuestos</th>
                                <th><span>$ {{number_format($impuesto)}}</span></th>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="3">Total a Pagar</th>
                                <th> <span>$ {{ number_format($total) }}</span></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ confirmation part end =================-->
@endsection
