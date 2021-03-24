@extends('layouts.guest')
@section('title', 'Carrito')
@section('content')
    <script type="text/javascript">
        function Confirmdelete(){
            var respuesta = confirm('¿Estas seguro de que quieres cancelar la compra?');
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
    </script>
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Lista del Carrito</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!--================Cart Area =================-->
    <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $product)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{$product->image}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>{{$product->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="btn_1"><i class="fas fa-search-plus"></i>&nbsp;Observar</a>
                                </td>
                                <td>
                                    <h5>{{$product->quantity}}</h5>
                                </td>
                                <td>
                                    <h5>$ {{number_format($product->total) }}</h5>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @if(isset($product))
                        <form method="POST" action="{{ route('cancelPurchase', $product->user_id) }}">
                            @csrf @method('DELETE')
                            <div class="checkout_btn_inner float-right">
                                <button type="submit" class="btn_1" onclick='return Confirmdelete()'>Cancelar compra</button>
                                <a class="btn_1" href="{{route('products')}}">Continuar comprando</a>
                                <a class="btn_1 checkout_btn_1" href="{{ url('/payment/transaccion', array('transaccion'=>0,'referencia'=>0)) }}">Proceder a Pagar</a>
                            </div>
                        </form>
                    @else
                        <h3>No has selecionado ningun Producto</h3>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
