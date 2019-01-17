<div class="modal fade" id="insertarFormacion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Insertar Curriculum</h4>
            </div>
            <div class="modal-body">
                <form id="formFormacion" class="form-horizontal" onsubmit="return checkSubmitFormacion();" method="POST" action="PanelUsuario/InsertarFormacion">
                    {{ csrf_field() }}
                    
                    <a class="tit-curriculum">Formacion</a>
                    <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                        <label for="titulo" class="col-md-4 control-label">Titulo</label>

                        <div class="col-md-6">
                            <select class="selectpicker form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required autofocus>
                                @foreach($titulos as $titulo)
                                <option>{{$titulo->nombre}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('titulo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('titulo') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('grado') ? ' has-error' : '' }}">
                        <label for="grado" class="col-md-4 control-label">Grado</label>

                        <div class="col-md-6">
                            <input id="grado" type="text" class="form-control" name="grado" value="{{ old('grado') }}" required autofocus>

                            @if ($errors->has('grado'))
                            <span class="help-block">
                                <strong>{{ $errors->first('grado') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('centro') ? ' has-error' : '' }}">
                        <label for="centro" class="col-md-4 control-label">Centro</label>

                        <div class="col-md-6">
                            <input id="centro" type="text" class="form-control" name="centro" value="{{ old('centro') }}" required autofocus>

                            @if ($errors->has('centro'))
                            <span class="help-block">
                                <strong>{{ $errors->first('centro') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="finalizado" class="col-md-4 control-label">Finalizado</label>
                        <div class="col-md-4">
                            <input name="finalizado" value="0" type="hidden"/>
                            <input id="finalizado" type="checkbox" class="form-check-input" name="finalizado" value="1" />
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('anyo_finalizacion') ? ' has-error' : '' }}">
                        <label for="anyo_finalizacion" class="col-md-4 control-label">Año Finalizacion</label>

                        <div class="col-md-6">
                            <input id="anyo_finalizacion" type="text" class="form-control" name="anyo_finalizacion" value="{{ old('anyo_finalizacion') }}" required autofocus>

                            @if ($errors->has('anyo_finalizacion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('anyo_finalizacion') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <input type="submit" id="botonForm" class="btn btn-primary" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>