
<div class="modal fade" id="insertarOferta">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Insertar Oferta</h4>
            </div>
            <div class="modal-body">
                <form id="formOfertas" onsubmit="return checkSubmitOferta();" class="form-horizontal" method="POST" action="PanelAdmin/InsertarOferta">
                    {{ csrf_field() }}

                    <a class="tit-curriculum">Ofertas</a>
                    
                   
                    <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                        <label for="titulo" class="col-md-4 control-label">Titulo</label>

                        <div class="col-md-6">
                            <input id="titulo" type="text" class="form-control" name="titulo" required autofocus>

                            @if ($errors->has('titulo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('titulo') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                        <label for="descripcion" class="col-md-4 control-label">Decripcion</label>

                        <div class="col-md-6">
                            <textarea id="descripcion" type="text" class="form-control" name="descripcion"  required autofocus></textarea>

                            @if ($errors->has('descripcion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('empresa') ? ' has-error' : '' }}">
                        <label for="empresa" class="col-md-4 control-label">Empresa</label>

                        <div class="col-md-6">
                            <input id="empresa" type="text" class="form-control" name="empresa"  required autofocus>

                            @if ($errors->has('empresa'))
                            <span class="help-block">
                                <strong>{{ $errors->first('empresa') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group{{ $errors->has('sector') ? ' has-error' : '' }}">
                        <label for="sector" class="col-md-4 control-label">Sector</label>

                        <div class="col-md-6">
                            <select class="selectpicker form-control" id="sector" name="sector" value="{{ old('sector') }}" required autofocus>
                                @foreach($sectores as $sector)
                                    <option>{{$sector->nombre}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('sector'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sector') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('fecha_limite') ? ' has-error' : '' }}">
                        <label for="fecha_limite" class="col-md-4 control-label">Fecha Limite</label>

                        <div class="col-md-6">
                            <input id="fecha_limite" type="date" class="form-control" name="fecha_limite" required autofocus>

                            @if ($errors->has('fecha_limite'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fecha_limite') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="modal-footer">
                            <input type="submit" id="botonO" class="btn btn-primary" value="Guardar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
