@extends('layouts.guest')
@section('title', 'Productos')
@section('content')

<body>
    <!--::header part start::-->



    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Productos</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="#">
                                <input type="text" name="#" placeholder="Buscador">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">
                                    @if(isset($category))
                                        {{$category}} <i class="right fas fa-caret-down"></i> </div>
                                    @else
                                        Categorias <i class="right fas fa-caret-down"></i> </div>
                                    @endif
                                <div class="select_option_dropdown">
                                    <p><a href="{{route('products')}}">Todos los Productos</a></p>
                                    <p><a href="{{route('catalogues', 1)}}">Mugs</a></p>
                                    <p><a href="{{route('catalogues', 2)}}">Camisas</a></p>
                                    <p><a href="{{route('catalogues', 3)}}">Portaretratos</a></p>
                                    <p><a href="{{route('catalogues', 4)}}">Cuadros</a></p>
                                    <p><a href="{{route('catalogues', 5)}}">promociones</a></p>
                                </div>
                            </div>
                        </div>
                        @if(isset(Auth::User()->rol) and Auth::User()->rol == 'admin')
                            <a href="{{route('crud')}}" type="button" class="btn btn-success">
                                <i class="fas fa-cogs"></i> Tabla de Productos
                            </a>
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="product_list">
                    @if(isset($products) and $products != '[]')
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-6 col-sm-6">
                                    <div class="single_product_item">
                                        <a href="{{route('productList', $product->id)}}">
                                            <img src="{{asset($product->image)}}" width="100%" class="img-fluid">
                                            <b><h3>{{$product->name}}</h3></b>
                                            <p>Precio ${{number_format($product->price)}}</p>
                                        </a>
                                        </b>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="load_more_btn text-center">
                            <a href="#" class="btn_3">Mostrar más</a>
                        </div>
                    </div>
                    @else
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <h2 class="text-center">No Hay Productos Disponibles</h2>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->
</body>
@endsection




