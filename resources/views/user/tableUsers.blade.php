@extends('layouts.guest')
@section('title', 'Usuarios')
@section('content')
    @include('user.registerAdmin')
    <script type="text/javascript">
        function Confirmdelete(){
            var respuesta = confirm('¿Estas seguro de que quieres eliminar este funcionario?');
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
                        <h2>Tabla de Usuarios</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <section class="container" style="margin-top: 20px;">
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Fecha de Registro</th>
                                <th>Configurar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{($user->id)}}visualizar">
                                            Visualizar
                                        </button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{($user->id)}}editar">
                                            Editar
                                        </button>&nbsp;&nbsp;&nbsp;
                                        <form action="{{ route('destroy.user', $user->id) }}" method="post">
                                            @csrf @method('DELETE')
                                            <button onclick='return Confirmdelete()' title="Borrar" class="btn btn-danger" ><i class="fas fa-trash"></i> Eliminar</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal de Visualizar-->
                                <div class="modal fade" id="modal{{($user->id)}}visualizar" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="margin-top: 5%;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="updateModal">{{('Visualizar Usuario')}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label>Nombre: </label>
                                                        <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label>Telefono: </label>
                                                        <input type="text" class="form-control" value="{{$user->phone}}" readonly>                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label>Dirección: </label>
                                                        <input type="text" class="form-control" value="{{$user->address}}" readonly>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label>Correo: </label>
                                                        <input type="text" class="form-control" value="{{$user->email}}" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label>Contraseña: </label>
                                                        <input type="password" class="form-control" value="{{$user->password}}" readonly>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="close">Aceptar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de Editar-->
                                <div class="modal fade" id="modal{{($user->id)}}editar" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="margin-top: 5%;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="updateModal">{{('Editar Producto')}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label>Nombre: </label>
                                                        <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                                                    </div>
                                                    <div class="col">
                                                        <label>Telefono: </label>
                                                        <textarea name="description" id="description" class="form-control" cols="30" rows="3" placeholder="Descripción">{{$user->description}}</textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label>Dirección: </label>
                                                        <input type="number" class="form-control" name="price" id="price" value="{{$user->price}}">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label>Correo: </label>
                                                        <input type="number" class="form-control" name="price" id="price" value="{{$user->price}}">
                                                    </div>
                                                    <div class="col">
                                                        <label>Contrasena: </label>
                                                        <input type="number" class="form-control" name="price" id="price" value="{{$user->price}}">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="close">Cancelar</button>
                                                    <button type="submit" class="btn btn-success"><i class="far fa-edit"></i> Editar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
