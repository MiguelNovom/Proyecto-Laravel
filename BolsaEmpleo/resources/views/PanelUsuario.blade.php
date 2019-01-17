@extends('layouts.app')

@section('content')
@if(session('message')) <div class="alert alert-{{ session('message')[0] }}"> {{ session('message')[1] }} </div> @endif
@include('partials.errors')
<div class="row">
    <div class="col-md-10">
        <div class="col-md-12 col-md-offset-2">
            <button type="submit" data-toggle="modal" data-target="#insertarExperiencia" class="btn btn-info">
                Insertar Experiencia
            </button>
            <button type="submit" data-toggle="modal" data-target="#insertarFormacion" class="btn btn-info">
                Insertar Formacion
            </button>
            <button type="submit" data-toggle="modal" data-target="#insertarIdiomas" class="btn btn-info">
                Insertar Idiomas
            </button>
            <button type="submit" data-toggle="modal" data-target="#emergente" class="btn btn-danger">
                Eliminar Currriculum
            </button>
            <a href="{{ route('Currriculum.pdf') }}" type="submit" class="btn btn-success">
                Exportar Curriculum
            </a>
            <a href="#" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editarPerfil">Perfil</a>
            <a href="{{ route('Ofertas') }}" class="btn btn-warning" type="submit">Ofertas</a>
        </div>
    </div>

    <div class="col-md-8 margenDiv1">
        <div class="col-md-12 col-md-offset-2">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Experiencias</th>
                    </tr>                            
                </thead>
                <tbody>
                    @foreach($experiencias as $experiencia)
                    <tr>
                        <td>{{ $experiencia->empresa }} - {{ $experiencia->puesto }}
                            <form class="formulario1" method="POST" action="PanelUsuario/BorrarExperiencia/{{$experiencia->id}}"> 
                                {{ method_field('DELETE') }} {{ csrf_field() }} 
                                <button class="btn btn-danger btn-xs pull-right">Eliminar</button>
                            </form>
                            <a role="button"
                            data-id="{{$experiencia->id}}"
                            data-puest="{{$experiencia->puesto}}"
                            data-f_r="{{$experiencia->funcion_realizada}}"
                            data-emp="{{$experiencia->empresa}}"
                            data-s_e="{{$experiencia->sector_empresa}}"
                            data-m_a_i="{{$experiencia->mes_anyo_inicio}}"
                            data-m_a_f="{{$experiencia->mes_anyo_fin}}"
                            data-toggle="modal"
                            data-target="#editarExperiencia"
                            class="editarExperiencia btn btn-primary btn-xs pull-right">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 col-md-offset-2">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Formaciones</th>
                    </tr>                            
                </thead>
                <tbody>
                    @foreach($formaciones as $formacion)
                    <tr>
                        <td>{{ $formacion->titulo }} - {{ $formacion->grado }}
                            <form class="formulario1" method="POST" action="PanelUsuario/BorrarFormacion/{{$formacion->id}}"> 
                                {{ method_field('DELETE') }} {{ csrf_field() }} 
                                <button href="" class="btn btn-danger btn-xs pull-right">Eliminar</button>
                            </form>
                            <a role="button" 
                            data-id="{{$formacion->id}}"
                            data-tit="{{$formacion->titulo}}" 
                            data-grad="{{$formacion->grado}}" 
                            data-cent="{{$formacion->centro}}" 
                            data-fin="{{$formacion->finalizado}}" 
                            data-a_y="{{$formacion->anyo_finalizacion}}" 
                            data-toggle="modal" 
                            data-target="#editarFormacion" 
                            class="editarFormacion btn btn-primary btn-xs pull-right">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 col-md-offset-2">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Idiomas</th>
                    </tr>                            
                </thead>
                <tbody>
                    @foreach($idiomas as $idioma)
                    <tr>
                        <td>{{ $idioma->idioma }}
                            <form class="formulario1" method="POST" action="PanelUsuario/BorrarIdiomas/{{$idioma->id}}"> 
                                {{ method_field('DELETE') }} {{ csrf_field() }} 
                                <button href="" class="btn btn-danger btn-xs pull-right">Eliminar</button>
                            </form>
                            <a role="button"
                            data-id="{{$idioma->id}}"
                            data-idio="{{$idioma->idioma}}"
                            data-n_h="{{$idioma->nivel_hablado}}"
                            data-n_e="{{$idioma->nivel_escrito}}"
                            data-tit="{{$idioma->titulo_oficial}}"
                            data-toggle="modal"
                            data-target="#editarIdiomas"
                            class="editarIdiomas btn btn-primary btn-xs pull-right">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>   

<script type="text/javascript">

    //Evitar que se creen varias formaciones, Idiomas y Experiencias
    
    function checkSubmitFormacion() {
        document.getElementById("botonForm").value = "Enviando...";
        document.getElementById("botonForm").disabled = true;
        return true;
    }
    function checkSubmitIdioma() {
        document.getElementById("botonIdiom").value = "Enviando...";
        document.getElementById("botonIdiom").disabled = true;
        return true;
    }
     function checkSubmitExperiencia() {
        document.getElementById("botonXp").value = "Enviando...";
        document.getElementById("botonXp").disabled = true;
        return true;
    }

    //Inicializacion del plugin para seleccionar varios campos y placeholder.

    $(document).ready(function() {
        $(".js-example-placeholder-multiple").select2({
            placeholder: "Selecciona los sectores en los que esta interesado"
        });
    });

    //Codigo js para que cargue los datos en la modal de idiomas

    $(document).on('click', '.editarIdiomas', function() {
        $('#idIdiomaE').val($(this).data('id'));
        $('#idiomaE').val($(this).data('idio'));
        $('#nivel_habladoE').val($(this).data('n_h'));
        $('#nivel_escritoE').val($(this).data('n_e'));
        $('#titulo_oficialE').val($(this).data('tit'));
    });

    //Codigo js para que cargue los datos en la modal de Experiencias

    $(document).on('click', '.editarExperiencia', function() {
        $('#idExp').val($(this).data('id'));
        $('#puestoE').val($(this).data('puest'));
        $('#funcion_realizadaE').val($(this).data('f_r'));
        $('#empresaE').val($(this).data('emp'));
        $('#sector_empresaE').val($(this).data('s_e'));
        $('#mes_anyo_inicioE').val($(this).data('m_a_i'));
        $('#mes_anyo_finE').val($(this).data('m_a_f'));
    });

    //Codigo js para que cargue los datos en la modal de Formaciones

    $(document).on('click', '.editarFormacion', function() {
        $('#idForm').val($(this).data('id'));
        $('#tituloE').val($(this).data('tit'));
        $('#gradoE').val($(this).data('grad'));
        $('#centroE').val($(this).data('cent'));
        if($(this).data('fin')===1){
            $('#finalizadoE').attr('checked','true');
        }
        $('#anyo_finalizacionE').val($(this).data('a_y'));
    });
</script>

@include('modals.InsertarExperiencia')
@include('modals.InsertarFormacion')
@include('modals.InsertarIdioma')
@include('modals.VentanaEmergente')
@include('modals.editarExperiencia')
@include('modals.editarFormacion')
@include('modals.editarIdioma')
@include('modals.editarPerfil')
@endsection

