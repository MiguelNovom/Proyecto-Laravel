<div class="modal fade" id="insertarIdiomas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Insertar Curriculum</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" onsubmit="return checkSubmitIdioma();" method="POST" action="PanelUsuario/InsertarIdiomas">
                    {{ csrf_field() }}

                    <a class="tit-curriculum">Idiomas</a>
                    <div class="form-group{{ $errors->has('idioma') ? ' has-error' : '' }}">
                        <label for="idioma" class="col-md-4 control-label">Idioma</label>

                        <div class="col-md-6">
                            <input id="idioma" type="text" class="form-control" name="idioma" value="{{ old('idioma') }}" required autofocus>

                            @if ($errors->has('idioma'))
                            <span class="help-block">
                                <strong>{{ $errors->first('idioma') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('nivel_hablado') ? ' has-error' : '' }}">
                        <label for="nivel_hablado" class="col-md-4 control-label">Nivel hablado</label>

                        <div class="col-md-6">
                            <input id="nivel_hablado" type="text" class="form-control" name="nivel_hablado" value="{{ old('nivel_hablado') }}" required autofocus>
                           
                            @if ($errors->has('nivel_hablado'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nivel_hablado') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('nivel_escrito') ? ' has-error' : '' }}">
                        <label for="nivel_escrito" class="col-md-4 control-label">Nivel escrito</label>

                        <div class="col-md-6">
                            <input id="nivel_escrito" type="text" class="form-control" name="nivel_escrito" value="{{ old('nivel_escrito') }}" required autofocus>

                            @if ($errors->has('nivel_escrito'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nivel_escrito') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('titulo_oficial') ? ' has-error' : '' }}">
                        <label for="titulo_oficial" class="col-md-4 control-label">Titulo Oficial</label>

                        <div class="col-md-6">
                            <input id="titulo_oficial" type="text" class="form-control" name="titulo_oficial" value="{{ old('titulo_oficial') }}" required autofocus>

                            @if ($errors->has('titulo_oficial'))
                            <span class="help-block">
                                <strong>{{ $errors->first('titulo_oficial') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <input type="submit" id="botonIdiom" class="btn btn-primary" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>