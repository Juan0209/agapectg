@extends('layouts.guest')
@section('title', 'Producto')
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
      @foreach($products as $product)
        <div class="col-lg-8">
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img">
               <img src="{{asset($product->image)}}" alt="#" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">

            <h3> {{$product->name}}
               </h3>
            <p> {{$product->description}}       </p>
            <div class="card_area">

                <div class="product_count_area">
                    <p>Cantidad</p>
                    <div class="product_count d-inline-block" >
                        <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                        <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
                        <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                    </div>
                    <p> <h3>$ {{number_format($product->price)}}</h3 ></p>
                </div>
    @endforeach
                <div class="add_to_cart">
                   <a href="{{route('fileview')}}" class="btn_3">Subir imagen</a>
                </div>
                <div class="add_to_cart">
                  <a href="{{route('cart')}}" class="btn_3">Agregar al carrito</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
