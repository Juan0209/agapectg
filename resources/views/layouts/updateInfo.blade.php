@foreach($users as $user)
@endforeach

<!-- Modal de Editar-->
<div class="modal fade" id="updateInformation" style="margin-top: 5%;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #BB8FCE;">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Actualización de información</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('updateInfo')}}" method="post">
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
                        <a type="button" class="btn btn-secondary" href="{{route('welcome.index')}}"><i class="far fa-times-circle"></i> Cancelar</a>
                        <button type="submit" class="btn btn-success"><i class="far fa-edit"></i> Actualizar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
