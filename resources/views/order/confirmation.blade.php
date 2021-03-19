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
                                <p>Número de factura</p><span>: 60235</span>
                            </li>
                            <li>
                                <p>Fecha</p><span>: 03-10-2017</span>
                            </li>
                            <li>
                                <p>total</p><span>: COP 2210</span>
                            </li>
                            <li>
                                <p>Metodo de Pago</p><span>: Pago Contra-Entrega</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Destinatario</h4>
                        <ul>
                            <li>
                                <p>Dirección</p><span>: Brr.alpes TV. 71 22B-52</span>
                            </li>
                            <li>
                                <p>Ciudad</p><span>: Cartagena</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Destinatario Secundario</h4>
                        <ul>
                            <li>
                                <p>direccion</p><span>: Brr.alpes TV. 71 22B-51</span>
                            </li>
                            <li>
                                <p>Ciudad</p><span>: Cartagena</span>
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
                            <tr>
                                <th colspan="3">Subtotal</th>
                                <th> <span>$ {{ number_format($subtotal) }}</span></th>
                            </tr>
                            <tr>
                                <th colspan="3">Cupón de descuento</th>
                                <th><span>-$ 50.000</span></th>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="3">Total a Pagar</th>
                                <th> <span>$ {{ number_format($subtotal-50000) }}</span></th>
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
