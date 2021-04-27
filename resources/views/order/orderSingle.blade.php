@extends('layouts.guest')
@section('title', 'Pedido')
@section('content')
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Descripción del Pedido</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->
    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">
            <div class="col-md-12 form-group">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="creat_account">
                            <h2>Informacion del Cliente</h2><hr>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label>Nombre: </label>
                            <input type="text" class="form-control" value="{{ $date->name }}" disabled>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label>Telefono: </label>
                            <input type="number" class="form-control" value="{{ $date->phone }}" disabled>
                        </div>
                        <div class="col-md-5 form-group p_star">
                            <label>ID Factura: </label>
                            <input type="number" class="form-control" value="{{ $date->id }}" disabled>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label>Dirección: </label>
                            <input type="text" class="form-control" value="{{ $date->address }}" disabled>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="creat_account">
                    <h3>Destinatario Secundario</h3><hr>
                </div>
                <div class="col-md-12 form-group p_star">
                    <label>Nombre: </label>
                    <input type="text" class="form-control" value="{{ $date->name2 }}" disabled>
                </div>
                <div class="col-md-12 form-group p_star">
                    <label>Telefono: </label>
                    <input type="number" class="form-control" value="{{ $date->phone2 }}" disabled>
                </div>
                <div class="col-md-12 form-group p_star">
                    <label>Dirección: </label>
                    <input type="text" class="form-control" value="{{ $date->add2 }}" disabled>
                </div>
                <br><br>
                @if($date->message != null)
                    <div class="creat_account">
                        <h3>Mensaje</h3><hr>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        {{--<input type="text"  value="{{  }}" disabled>--}}
                        <textarea class="form-control" cols="30" rows="10" disabled>{{$date->message}}</textarea>
                    </div>
                    <br><br>
                @endif
                @if($date->details != null)
                    <div class="creat_account">
                        <h3>Detalles de la Compra</h3><hr>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        {{--<input type="text" class="form-control" value="{{ $date->details }}" disabled>--}}
                        <textarea class="form-control" cols="30" rows="10" disabled>{{$date->details}}</textarea>
                    </div>
                @endif
                <div class="creat_account">
                    <h2>Pedidos</h2><hr>
                </div>
                <?php $num = 1 ?>
                @foreach($orders as $order)
                    <div class="creat_account">
                        <h3>Pedido #{{$num}}</h3>
                    </div>
                    <div class="col-md-5 form-group p_star">
                        <label>Producto: </label>
                        <input type="text" class="form-control" value="{{ $order->name }}" disabled>
                    </div>
                    <div class="col-md-3 form-group p_star">
                        <label>Cantidad: </label>
                        <input type="number" class="form-control" value="{{ $order->quantity }}" disabled>
                    </div>
                    <div class="col-md-3 form-group p_star">
                        <label>Personas a ilustrar: </label>
                        <input type="text" class="form-control" value="{{ $order->peoples }}" disabled>
                    </div>
                    <div class="col-md-12 form-group p_star">
                        <label>Fotografia a ilustrar: </label>
                        <img src="{{asset($order->image)}}" alt="">
                    </div><hr>
                    <?php $num += 1 ?>
                @endforeach
                <div class="float-right">
                    @if($mod ==1)
                        <a href="{{route('bill')}}" class="btn btn-outline-secondary">Volver</a>
                    @else
                        <a href="{{route('orders')}}" class="btn btn-outline-secondary">Volver</a>
                        <a href="{{ url('/state', array('bill'=>$date->id,'view'=>'orders')) }}" class="btn btn-success">Confirmar Pedido</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
