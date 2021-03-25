@extends('layouts.guest')
@section('title', 'Carrito')
@section('content')
    <script type="text/javascript">
        function Confirmdelete(){
            var respuesta = confirm('¿Estas seguro de que quieres borrar todo y cancelar la compra?');
            if (respuesta == true){
                return true;
            }else{
                return false;
            }
        }
        function Confirmdeleteproduct(){
            var respuesta = confirm('¿Estas seguro de que quieres borrar este producto?');
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
                            <th scope="col">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 0 ?>
                        @foreach($order as $product)
                            <?php $i += 1 ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset($product->productImage)}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>{{$product->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#image{{$i}}" class="btn_1"><i class="fas fa-search-plus"></i>&nbsp;Observar</a>
                                </td>
                                <td>
                                    <h5>{{$product->quantity}}</h5>
                                </td>
                                <td>
                                    <h5>$ {{number_format($product->total) }}</h5>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('cancelProduct', $product->id) }}">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick='return Confirmdeleteproduct()'><i class="fas fa-minus-circle"></i></button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="image{{$i}}" tabindex="-1" aria-labelledby="exampleModalLabel" style="margin-top: 80px;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background: #BB8FCE;">
                                            <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Fotografia a ilustrar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="container">
                                                <div class="row align-items-center">

                                                    @if(isset($product->image))
                                                        <img src="{{asset($product->image)}}" style="margin-left: auto; margin-right: auto;">
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </tbody>
                    </table>
                    @if(isset($product) and !empty($product))
                        <?php $product->user_id = auth()->user()->id ?>
                        <div class="checkout_btn_inner float-right">
                            <form method="POST" action="{{ route('cancelPurchase', $product->user_id) }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn_1" onclick='return Confirmdelete()'>Cancelar compra</button>
                                <a class="btn_1" href="{{route('products')}}">Continuar comprando</a>
                                <a class="btn_1 checkout_btn_1" href="{{ url('/payment/transaccion', array('transaccion'=>0,'referencia'=>0)) }}">Proceder a Pagar</a>
                            </form>
                        </div>
                    @else
                        <h3>No has selecionado ningun Producto</h3>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
