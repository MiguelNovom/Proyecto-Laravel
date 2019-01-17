<div class="modal fade" id="pdfs">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Pdfs</h4>
            </div>
            <div class="modal-body ">
                <a href="{{ route('Usersxfamilia.pdf') }}" type="submit" class="botones1 btn btn-success">
                    Usuarios por familia profesional 
                </a>
                <form id="formOfertas" class="form-horizontal" method="POST" action="PanelAdmin/DescargarPDF2">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="fecha_inicio" class="col-md-4 control-label">Fecha Inicio</label>
                        <div class="col-md-8">
                            <input id="fecha_inicio" type="date" class="form-control" name="fecha_inicio" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin" class="col-md-4 control-label">Fecha Fin</label>
                        <div class="col-md-8">
                            <input id="fecha_fin" type="date" class="form-control" name="fecha_fin" required autofocus>
                        </div>
                    </div>
                    <input type="submit" class="botones1 btn btn-success" value="Ofertas por familia profesional">
                </form>
                <form id="formOfertas" class="form-horizontal" method="POST" action="PanelAdmin/DescargarPDF3">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="fecha_inicio" class="col-md-4 control-label">Fecha Inicio</label>
                        <div class="col-md-8">
                            <input id="fecha_inicio" type="date" class="form-control" name="fecha_inicio" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin" class="col-md-4 control-label">Fecha Fin</label>
                        <div class="col-md-8">
                            <input id="fecha_fin" type="date" class="form-control" name="fecha_fin" required autofocus>
                        </div>
                    </div>
                    <input type="submit" class="botones1 btn btn-success" value="Usuarios seleccionados">
                </form>
                <form id="formECurriculums" class="form-horizontal" method="POST" action="PanelAdmin/EnviarCurriculums" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="empresa" class="col-md-4 control-label">Empresa</label>
                        <div class="col-md-8">
                            <input id="empresa" type="text" class="form-control" name="empresa" required autofocus>
                            @if ($errors->has('empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('empresa') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="curriculums" class="col-md-6 control-label">Seleccione los curriculums que quiere enviar</label>
                        <div class="col-md-6">
                            <input id="curriculums" class="seleccinararchivo" name="curriculums[]" multiple="true" type="file" required> 
                            @if ($errors->has('curriculums'))
                            <span class="help-block">
                                <strong>{{ $errors->first('curriculums') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <input type="submit" class="botones1 btn btn-success" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</div>