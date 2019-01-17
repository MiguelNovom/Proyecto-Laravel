<div class="modal fade" id="editarPerfil">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Editar Perfil</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="PanelUsuario/EditarPerfil" enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <a class="tit-curriculum">Datos Personales</a>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nombre</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('second_name') ? ' has-error' : '' }}">
                        <label for="second_name" class="col-md-4 control-label">Apellidos</label>

                        <div class="col-md-6">
                            <input id="second_name" type="text" class="form-control" name="second_name" value="{{ $user->second_name }}" required autofocus>

                            @if ($errors->has('second_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('second_name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('provincia') ? ' has-error' : '' }}">
                        <label for="provincia" class="col-md-4 control-label">Provincia</label>

                        <div class="col-md-6">
                            <input id="provincia" type="text" class="form-control" name="provincia" value="{{ $user->provincia }}" required autofocus>

                            @if ($errors->has('provincia'))
                            <span class="help-block">
                                <strong>{{ $errors->first('provincia') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('localidad') ? ' has-error' : '' }}">
                        <label for="localidad" class="col-md-4 control-label">Localidad</label>

                        <div class="col-md-6">
                            <input id="localidad" type="text" class="form-control" name="localidad" value="{{ $user->localidad }}" required autofocus>

                            @if ($errors->has('localidad'))
                            <span class="help-block">
                                <strong>{{ $errors->first('localidad') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                        <label for="direccion" class="col-md-4 control-label">Direccion</label>

                        <div class="col-md-6">
                            <input id="direccion" type="text" class="form-control" name="direccion" value="{{ $user->direccion }}" required autofocus>

                            @if ($errors->has('direccion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('direccion') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                        <label for="telefono" class="col-md-4 control-label">Telefono</label>

                        <div class="col-md-6">
                            <input id="telefono" type="text" class="form-control" name="telefono" value="{{ $user->telefono }}" required autofocus>

                            @if ($errors->has('telefono'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefono') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">

                        <label for="vehiculo" class="col-md-4 control-label">Vehiculo</label>
                        <div class="col-md-4">
                            <input name="vehiculo" value="0" type="hidden"/>
                            @if($user->vehiculo == 0)
                                <input id="vehiculo" type="checkbox" class="form-check-input" name="vehiculo" value="1" />
                            @else 
                                <input id="vehiculo" type="checkbox" class="form-check-input" name="vehiculo" value="1" checked="True"/>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto" class="col-md-4 control-label">Foto de perfil</label>
                        <div class="col-md-4">
                            <input id="foto" name="foto" type="file"/> 
                            @if ($errors->has('foto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('foto') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <a href="{{ route('peticionEliminar',$user->id) }}" type="submit" class="btnEliminar btn btn-danger">
                Eliminar Cuenta
            </a>
        </div>
    </div>
</div>
