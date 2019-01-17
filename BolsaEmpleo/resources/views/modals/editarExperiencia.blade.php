<div class="modal fade" id="editarExperiencia">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Editar Curriculum</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="PanelUsuario/EditarExperiencia">
                    {{ csrf_field() }}

                    <input type="hidden" id="idExp" name="id"/>
                    <a class="tit-curriculum">Experiencia</a>
                    <div class="form-group{{ $errors->has('puesto') ? ' has-error' : '' }}">
                        <label for="puesto" class="col-md-4 control-label">Puesto</label>

                        <div class="col-md-6">
                            <input id="puestoE" type="text" class="form-control" name="puesto" value="{{ old('puesto') }}" required autofocus>

                            @if ($errors->has('puesto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('puesto') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('funcion_realizada') ? ' has-error' : '' }}">
                        <label for="funcion_realizada" class="col-md-4 control-label">Funcion Realizada</label>

                        <div class="col-md-6">
                            <input id="funcion_realizadaE" type="text" class="form-control" name="funcion_realizada" value="{{ old('funcion_realizada') }}" required autofocus>

                            @if ($errors->has('funcion_realizada'))
                            <span class="help-block">
                                <strong>{{ $errors->first('funcion_realizada') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
                        <label for="empresa" class="col-md-4 control-label">Empresa</label>

                        <div class="col-md-6">
                            <input id="empresaE" type="text" class="form-control" name="empresa" value="{{ old('empresa') }}" required autofocus>

                            @if ($errors->has('empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('empresa') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('sector_empresa') ? ' has-error' : '' }}">
                        <label for="sector_empresa" class="col-md-4 control-label">Sector Empresa</label>

                        <div class="col-md-6">
                            <select class="selectpicker form-control" id="sector_empresaE" name="sector_empresa" value="{{ old('sector_empresa') }}" required autofocus>
                                @foreach($sectores as $sector)
                                <option>{{$sector->nombre}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('sector_empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sector_empresa') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('mes_anyo_inicio') ? ' has-error' : '' }}">
                        <label for="mes_anyo_inicio" class="col-md-4 control-label">Mes y año de inicio</label>

                        <div class="col-md-6">
                            <input id="mes_anyo_inicioE" type="text" class="form-control" name="mes_anyo_inicio" value="{{ old('mes_anyo_inicio') }}" required autofocus>

                            @if ($errors->has('mes_anyo_inicio'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mes_anyo_inicio') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('mes_anyo_fin') ? ' has-error' : '' }}">
                        <label for="mes_anyo_fin" class="col-md-4 control-label">Mes y año de Fin</label>

                        <div class="col-md-6">
                            <input id="mes_anyo_finE" type="text" class="form-control" name="mes_anyo_fin" value="{{ old('mes_anyo_fin') }}" required autofocus>

                            @if ($errors->has('mes_anyo_fin'))
                            <span class="help-block">
                                <strong>{{ $errors->first('mes_anyo_fin') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>