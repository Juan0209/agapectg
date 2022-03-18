@extends('layouts.guest')
@section('title', 'Funcionarios')
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
                        <h2>Tabla de Funcionarios</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

<section class="container" style="margin-top: 20px;">
    <div class="container">

        <div class="card shadow mb-4">
            <div class="card-header py-3 ">
                <h1><a class="btn btn-outline-info" href="#" data-toggle="modal" data-target="#registerAdmin">Crear Funcionario</a></h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th><b style="color: blue;">Nombre</b></th>
                            <th><b style="color: blue;">Correo</b></th>
                            <th><b style="color: blue;">Direccion</b></th>
                            <th><b style="color: blue;">Telefono</b></th>
                            <th><b style="color: blue;">Fecha de Registro</b></th>
                            <th><b style="color: blue;">Configurar</b></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $fact)
                        <tr>
                            <td><b style="color: black;">{{ $fact->name }}</b></td>
                            <td><b style="color: black;">{{ $fact->email }}</b></td>
                            <td><b style="color: black;">{{ $fact->address }}</b></td>
                            <td><b style="color: black;">{{ $fact->phone }}</b></td>
                            <td><b style="color: black;">{{ $fact->created_at->diffForHumans() }}</b></td>
                            <td>
                                <form action="{{ route('destroy.user', $fact->id) }}" method="post">
                                  @csrf @method('DELETE')
                                    <button onclick='return Confirmdelete()' title="Borrar" class="btn btn-danger btn-circle" ><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br/> <br/>
    </div>
</section>
@endsection
