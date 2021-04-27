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
                                <th>Ultima Modificación</th>
                                <th>Configurar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal{{($user->id)}}visualizar">
                                            Visualizar
                                        </button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal{{($user->id)}}editar">
                                            Editar
                                        </button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal{{($user->id)}}destroy">
                                            <i class="far fa-trash-alt"></i> Eliminar
                                        </button>
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
                                                        <input type="text" class="form-control" value="{{$user->phone}}" readonly>
                                                    </div>
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
                                                        <input type="password" class="form-control" value="{{ substr($user->password, 0, 10) }}" readonly>
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
                                                <form action="{{route('update.user')}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label>Nombre: </label>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                                                        </div>
                                                        <div class="col">
                                                            <label>Telefono: </label>
                                                            <input type="text" class="form-control" name="phone" id="phone" value="{{$user->phone}}">                                                    </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label>Dirección: </label>
                                                            <input type="text" class="form-control" name="address" id="address" value="{{$user->address}}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label>Correo: </label>
                                                            <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}">
                                                        </div>
                                                        <div class="col">
                                                            <label>Contraseña: (OPCIONAL)</label>
                                                            <input type="password" class="form-control" name="password" id="password" placeholder="Ingresar nueva contraseña">
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
                                <div class="modal fade" id="modal{{($user->id)}}destroy" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="margin-top: 100px;" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">{{('Eliminar Usario')}}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label> ¿Estas seguro de eliminar al usuario "<strong>{{$user->name}}</strong>" de la base de datos?</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <form action="{{route('destroy')}}" method="POST">
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Eliminar</button>
                                                    @method('DELETE')
                                                </form>
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
