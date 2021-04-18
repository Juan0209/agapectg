@extends('layouts.guest')
@section('title', 'Domicilios')
@section('content')
    <!-- breadcrumb part start-->
    <section class="breadcrumb_part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <h2>Domicilios</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb part end-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class=" container">
            <a href="{{route('confirmationDelivery')}}" class="btn btn-success">Confirmar Entrega</a>
        </div>
        <br>
        <div class="container">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        @if($deliveries == '[]')
                            <h2 class="text-center">No Hay Domicilios Pendientes</h2>
                        @else
                            <table class="table table-bordered table-hover table-striped" id="dataTable">
                                <thead>
                                <tr>
                                    <th>ID Factura</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Precio</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($deliveries as $delivery)
                                    <tr>
                                        <th>{{$delivery->id}}</th>
                                        <td>{{$delivery->name}}</td>
                                        <td>{{$delivery->phone}}</td>
                                        <td>$ {{number_format($delivery->total)}}</td>
                                        <td>
                                            <button type="button" data-toggle="modal" data-target="#modal{{$delivery->id}}" class="btn btn-primary">Visualizar Domicilio</button>
                                        </td>
                                    </tr>
                                    <!-- Modal de Crear-->
                                    <div class="modal fade" id="modal{{$delivery->id}}" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="margin-top: 5%;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="createmodal">Informacion de Domicilio</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <h5>Información del Cliente</h5>
                                                            <label class="form-check-label">Nombre: </label>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{$delivery->name}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label class="form-check-label">Telefono: </label>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{$delivery->phone}}" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <label class="form-check-label">ID Factura: </label>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{$delivery->id}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label class="form-check-label">Dirección: </label>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{$delivery->address}}" readonly>
                                                        </div>
                                                    </div><hr>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <h5>Destinatario Secundario</h5>
                                                            <label class="form-check-label">Nombre: </label>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{$delivery->name2}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label class="form-check-label">Telefono: </label>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{$delivery->phone2}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                            <label class="form-check-label">Dirección: </label>
                                                            <input type="text" class="form-control" name="name" id="name" value="{{$delivery->add2}}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                        <a href="#" class="btn btn-primary">En Camino</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
