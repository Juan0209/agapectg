@extends('layouts.guest')
@section('title', 'Pedidos')
@section('content')
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Pedidos</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        @if($orders == '[]')
                            <h2 class="text-center">No Hay Pedidos Pendientes</h2>
                        @else
                            <table class="table table-bordered table-hover table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>ID Factura</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Precio</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <th>{{$order->id}}</th>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>$ {{number_format($order->total)}}</td>
                                            <td>
                                                <a href="{{url('/orders', array('id'=>$order->id, 'mode'=> 0))}}" class="btn btn-primary"><i class="far fa-edit"></i> Visualizar Pedido</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
