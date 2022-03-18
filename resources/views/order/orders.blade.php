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
    <section class="container" style="margin-top: 20px;">
        <div class="container">
            <br/> <br/>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        @if($orders == '[]' or !isset($state[0]) or $state[0] !=3 and $state[0] !=4)
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
                                <?php $i = 0 ?>
                                    @foreach($orders as $order)
                                        <tr>
                                            <th>{{$order->id}}</th>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>$ {{number_format($order->total)}}</td>
                                            @if(isset($state[$i]) and $state[$i] == 4)
                                                <td>
                                                    <a href="{{url('/orders', array('id'=>$order->id, 'mode'=> 0))}}" class="btn btn-primary"><i class="fas fa-eye"></i> Visualizar Pedido</a>
                                                </td>
                                            @else
                                                <td>
                                                    <input class="btn btn-primary" type="button" onclick="mensaje('El usuario aun no ha rellenado la encuesta requerida. Por favor, intenta mas tarde.')" value="Pedido en Progreso...">
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
            <br/> <br/> <br/>
        </div>
    </section>
@endsection
