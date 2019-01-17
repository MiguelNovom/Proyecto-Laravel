<div class="modal fade" id="emergente">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>×</span>
                </button>
                <h4>Eliminar Curriculum</h4>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col-md-12 col-md-offset-2">
                        <form  method="POST" action="PanelUsuario/EliminarCurriculum"> 
                            {{ method_field('DELETE') }} {{ csrf_field() }} 
                            <button type="submit" name="deleteC" class="btn btn-danger"> {{ __(" Aceptar")}} </button> 
                            <button type="submit" data-dismiss="modal" class="btn btn-default"> {{ __(" Cancelar")}} </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>