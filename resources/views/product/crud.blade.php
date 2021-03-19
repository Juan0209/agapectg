@extends('layouts.guest')
@section('title', 'Tabla Productos')
@section('content')

<section class="breadcrumb_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <h2>Tabla de Productos</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="container">
        <br>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" style="margin: 4pt;">
            <i class="fas fa-plus"></i> Agregar
        </button>

        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Imagén</th>
                  <th>Precio</th>

                  <th>Opciones</th>

                </tr>
            </thead>
            <tbody>
                @foreach($cruds as $row)
                    <tr>
                        <th>{{$row->id}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->description}}</td>
                        <td>{{$row->image}}</td>
                        <td>{{$row->price}}</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{($row->id)}}editar">
                                <i class="far fa-edit"></i> Editar
                            </button>&nbsp;&nbsp;&nbsp;

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal{{($row->id)}}destroy">
                                <i class="far fa-trash-alt"></i> Eliminar
                            </button>
                        </td>

                        <!-- Modal de Editar-->
                        <div class="modal fade" id="modal{{($row->id)}}editar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModal">{{('Editar')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form method="POST" id="update-form" action="{{route('update')}}" >
                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-row">
                                                <div class="col" >
                                                    <input type="number" class="form-control" name="id" id="id" value="{{$row->id}}" placeholder="ID" >
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" name="name" id="name" value="{{$row->name}}"  placeholder="name">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <input type="text" class="form-control" name="description" id="description" value="{{$row->description}}"  placeholder="Description">
                                                </div>
                                                <div class="col">
                                                    <input type="number" class="form-control" name="price" id="price" value="{{$row->price}}" placeholder="Price">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <input type="text" class="form-control" name="image" id="image" value="{{$row->image}}" placeholder="image">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Close</button>
                                                <button type="submit" class="btn btn-primary rounded">Insertar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal de Eliminar-->
                        <div class="modal fade" id="modal{{($row->id)}}destroy" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{('Eliminar producto')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>  Borrar <strong>{{$row->name}}</strong> </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                        <form action="{{route('destroy')}}" method="POST">
                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                            @csrf
                                            <button type="submit" class="btn btn-primary" > Ejecutar </button>
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal de Crear-->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createmodal">Crear producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{action('App\Http\Controllers\ProductsController@store')}}">
                        <div class="form-row">
                            <div class="col">
                                <input type="number" class="form-control" name="id" id="id" placeholder="ID">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="name" id="name" placeholder="name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="description" id="description" placeholder="Description">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="image" id="image" placeholder="image">
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" name="catalogues_id" id="catalogues_id" placeholder="catalogues id">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
