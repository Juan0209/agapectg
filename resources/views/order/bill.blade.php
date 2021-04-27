@extends('layouts.guest')
@section('title', 'Facturas')
@section('content')
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Facturas</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- ================ contact section start ================= -->
    <section class="container" style="margin-top: 20px;">
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        @if($bills == '[]')
                            <h2 class="text-center">No Hay Facturas Pendientes</h2>
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
                                <?php $i = 0 ?>
                                @foreach($bills as $bill)
                                    <tr>
                                        <th>{{$bill->id}}</th>
                                        <td>{{$bill->name}}</td>
                                        <td>{{$bill->phone}}</td>
                                        <td>$ {{number_format($bill->total)}}</td>
                                        @if($orders[$i] > 3 )
                                            <td>
                                                <a href="{{url('/orders', array('id'=>$bill->id, 'mode'=> 1))}}" class="btn btn-primary"><i class="far fa-edit"></i> Visualizar Pedido</a>
                                            </td>
                                        @else
                                            <td>
                                                <input class="btn btn-primary" type="button" onclick="mensaje('El usuario aun no ha rellenado la encuesta requerida. Por favor, intenta mas tarde.')" value="Visualizar Pedido">
                                                <script>
                                                    function mensaje(texto) {
                                                        alert(texto);
                                                    }
                                                </script>
                                            </td>
                                        @endif
                                    </tr>
                                    <?php $i++ ?>
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
