@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <label for="dni" class="col-md-4 control-label">Dni</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}" required autofocus>

                                @if ($errors->has('dni'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('dni') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                <input id="second_name" type="text" class="form-control" name="second_name" value="{{ old('second_name') }}" required autofocus>

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
                                <input id="provincia" type="text" class="form-control" name="provincia" value="{{ old('provincia') }}" required autofocus>

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
                                <input id="localidad" type="text" class="form-control" name="localidad" value="{{ old('localidad') }}" required autofocus>

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
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required autofocus>

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
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required autofocus>

                                @if ($errors->has('telefono'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fecha_nac') ? ' has-error' : '' }}">
                            <label for="fecha_nac" class="col-md-4 control-label">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <input id="fecha_nac" type="date" class="form-control" name="fecha_nac" value="{{ old('fecha_nac') }}" required autofocus>

                                @if ($errors->has('fecha_nac'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('fecha_nac') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="vehiculo" class="col-md-4 control-label">Vehiculo</label>
                            <div class="col-md-4">
                                <input name="vehiculo" value="0" type="hidden"/>
                                <input id="vehiculo" type="checkbox" class="form-check-input" name="vehiculo" value="1" />
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
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
