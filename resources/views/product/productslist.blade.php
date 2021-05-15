@extends('layouts.guest')
@section('title', 'Descripción')
@section('content')
<section class="breadcrumb_part single_product_breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container">
      <div class="row justify-content-center">
          <?php $product = $products[0]; ?>
        <div class="col-lg-8">
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img">
                @if(session()->has('danger'))
                    <div class="alert alert-danger text-center"><i class="fas fa-exclamation-triangle"></i> {{ session()->get('danger') }} <i class="fas fa-exclamation-triangle"></i></div>
                @endif
               <img src="{{asset($product->image)}}" style="width: 70%; margin-left: auto; margin-right: auto;" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
              <form action="{{route('cart.add')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <h3>{{$product->name}}</h3><hr>
                <p>{{$product->description}}</p>
                  <input type="hidden" name="id_product" id="id_product" value="{{$product->id}}">
                  <input type="hidden" name="price" id="price" value="{{$product->price}}">
                <div class="card_area">
                    <p> <h3>$ {{number_format($product->price)}}</h3></p>
                    <h5>Cantidad</h5>
                    <div class="product_count_area">
                        <div class="product_count d-inline-block" >
                            <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                            <input class="product_count_item input-number" type="text" name="quantity" id="quantity" value="1" min="1" max="30">
                            <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                        </div>
                    </div>
                    <div class="add_to_cart">
                        <h5>Foto a ilustrar</h5>
                        <div class="container btn_3">
                            <input type="file" name="file" id="file" accept="image/*">
                            @error('file')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="add_to_cart">
                        <h5>Personas/Mascotas a ilustrar</h5>
                        <div class="container">
                            <input type="number" value="1" class="form-control col-md-1 form-group p_star" name="peoples" id="peoples">
                            <div class="alert alert-warning text-center"><i class="fas fa-exclamation-triangle"></i> En caso de que el numero de personas y/o mascotas a ilustrar sea mayor a los que se encuentran en la fotografia suministrada, nos comunicaremos con usted para aclarar dudas e inquietudes <i class="fas fa-exclamation-triangle"></i></div>
                        </div>
                    </div>
                    <div class="add_to_cart">
                        <a href="{{route('products')}}" class="btn_1"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;Volver</a>
                        @if(isset(Auth::User()->rol))
                            <button type="submit" class="btn_1">Agregar al carrito&nbsp;&nbsp;<i class="flaticon-shopping-cart-black-shape"></i></button>
                        @else
                            <a href="#" role="button" class="btn_1" onclick="mensaje('Para poder continuar es necesario iniciar sesion.')">Agregar al carrito&nbsp;&nbsp;<i class="flaticon-shopping-cart-black-shape"></i></a>
                            <script>
                                function mensaje(texto) {
                                    alert(texto);
                                    redireccion();
                                }
                                function redireccion() {

                                    var link = '/products/{{$product->id}}'
                                    document.location.href = link;
                                }

                            </script>
                        @endif
                    </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
