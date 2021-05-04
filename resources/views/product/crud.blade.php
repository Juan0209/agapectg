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
        <br><br>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    @if(isset($cruds) and $cruds != '[]')
                        <table class="table table-bordered table-hover table-striped" id="dataTable">
                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Nombre</th>
                                  <th>Descripción</th>
                                  {{--<th>Imagén</th>--}}
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
                                        {{--<td>{{$row->image}}</td>--}}
                                        <td>$ {{number_format($row->price)}}</td>
                                        <td>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{($row->id)}}editar">
                                                <i class="far fa-edit"></i> Editar
                                            </button>&nbsp;&nbsp;&nbsp;

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal{{($row->id)}}destroy">
                                                <i class="far fa-trash-alt"></i> Eliminar
                                            </button>
                                        </td>

                                        <!-- Modal de Editar-->
                                        <div class="modal fade" id="modal{{($row->id)}}editar" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="margin-top: 5%;" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="updateModal">{{('Editar Producto')}}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form method="POST" id="update-form" action="{{route('update')}}" enctype="multipart/form-data">
                                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-row">

                                                                <input type="hidden" class="form-control" name="id" id="id" value="{{$row->id}}" placeholder="ID" readonly="">

                                                                <div class="col">
                                                                    <label>Nombre: </label>
                                                                    <input type="text" class="form-control" name="name" id="name" value="{{$row->name}}"  placeholder="name">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label>Descripción: </label>
                                                                    <textarea name="description" id="description" class="form-control" cols="30" rows="3" placeholder="Descripción" required>{{$row->description}}</textarea>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label>Precio: </label>
                                                                    <input type="number" class="form-control" name="price" id="price" value="{{$row->price}}" placeholder="Price">
                                                                </div>
                                                                <div class="col">
                                                                    <label>Catalogo: </label>
                                                                    <div id="default-select_2">
                                                                        <select class="mb-30" style="align-content: center" name="catalogues_id" id="catalogues_id">
                                                                            <option value="1" @if($row->catalogues_id == 1) selected @endif>Mugs</option>
                                                                            <option value="2" @if($row->catalogues_id == 2) selected @endif>Camisas</option>
                                                                            <option value="3" @if($row->catalogues_id == 3) selected @endif>Portaretratos</option>
                                                                            <option value="4" @if($row->catalogues_id == 4) selected @endif>Cuadros</option>
                                                                            <option value="5" @if($row->catalogues_id == 5) selected @endif>Promociones</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="form-row">
                                                                <div class="col">
                                                                    <label>Imagen: </label>
                                                                    <input type="file" name="image" id="image" placeholder="image" accept="image/*">
                                                                    @error('file')
                                                                        <small class="text-danger">{{$message}}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Cancelar</button>
                                                                <button type="submit" class="btn btn-success"><i class="far fa-edit"></i> Editar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal de Eliminar-->
                                        <div class="modal fade" id="modal{{($row->id)}}destroy" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="margin-top: 100px;" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">{{('Eliminar producto')}}</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <label> ¿Estas seguro de eliminar el producto "<strong>{{$row->name}}</strong>" de la base de datos?</label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                                                        <form action="{{route('destroy')}}" method="POST">
                                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
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
                    @else
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <h2 class="text-center">No Has Agregado Ningun Producto</h2>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de Crear-->
    <div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="margin-top: 5%;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createmodal">Crear producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label>Nombre: </label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                            </div>
                        </div>
                    <br>
                        <div class="form-row">
                            <div class="col">
                                <label>Descripción: </label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="3" placeholder="Descripción" required></textarea>
                            </div>
                        </div>
                    <br>
                        <div class="form-row">
                            <div class="col">
                                <label>Precio: </label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Precio" required>
                            </div>
                            <div class="col">
                                <label>Catalogo: </label>
                                <div id="default-select_2">
                                    <select class="mb-30" style="align-content: center" name="catalogues_id" id="catalogues_id">
                                        <option value="1">Mugs</option>
                                        <option value="2">Camisas</option>
                                        <option value="3">Portaretratos</option>
                                        <option value="4">Promociones</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <br>
                        <div class="form-row">
                            <div class="col">
                                <label for="image">Imagen: </label>
                                <input type="file" name="image" id="image" accept="image/*">
                                @error('file')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    <br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
