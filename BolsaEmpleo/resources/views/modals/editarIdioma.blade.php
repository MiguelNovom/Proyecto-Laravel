
<div class="modal fade" id="editarIdiomas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Editar Idioma</h4>
            </div>
            <div class="modal-body">
                <form id="formIdiomas" class="form-horizontal" method="POST" action="PanelUsuario/EditarIdiomas">
                    {{ csrf_field() }}

                    <a class="tit-curriculum">Idiomas</a>
                    
                    <input id="idIdiomaE" type="hidden" name="id">
                    <div class="form-group{{ $errors->has('idioma') ? ' has-error' : '' }}">
                        <label for="idioma" class="col-md-4 control-label">Idioma</label>

                        <div class="col-md-6">
                            <input id="idiomaE" type="text" class="form-control" name="idioma" required autofocus>

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
                            <input id="nivel_habladoE" type="text" class="form-control" name="nivel_hablado"  required autofocus>

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
                            <input id="nivel_escritoE" type="text" class="form-control" name="nivel_escrito"  required autofocus>

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
                            <input id="titulo_oficialE" type="text" class="form-control" name="titulo_oficial" required autofocus>

                            @if ($errors->has('titulo_oficial'))
                            <span class="help-block">
                                <strong>{{ $errors->first('titulo_oficial') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
