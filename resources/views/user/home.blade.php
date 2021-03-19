@extends('layouts.guest')
@section('title', 'Inicio')
@section('content')
    <?php $num=0; ?>
    @foreach( $product as $fact )
        <?php $num++; ?>
        <section class="banner_part">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="banner_text">
                            <div class="banner_text_iner">
                                <h1>{{ $fact->name }}</h1>
                                <p>{{ $fact->description }}</p>
                                <h4>Precio: {{ number_format($fact->price) }}</h4>
                                <form method="POST" action="{{ route('cart-product') }}">
                                    @csrf
                                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="id_product" value="{{ $fact->id }}">
                                    <input type="hidden" name="name" value="{{ $fact->name }}">
                                    <input type="hidden" name="image" value="{{ $fact->image }}">
                                    <input type="hidden" name="price" value="{{ $fact->price }}">
                                    <div class="banner_text_iner">
                                        <h3>Cantidad:</h3>
                                        <input type="number" class="form-control" name="quantity" required>
                                    </div>

                                    <button type="submit" class="btn_1" <?=$num?>>Agregar al carro</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner_img">
                <img src="{{ $fact->image }}" alt="#"  height="500" width="800" >

            </div>
        </section>
    @endforeach
@endsection
