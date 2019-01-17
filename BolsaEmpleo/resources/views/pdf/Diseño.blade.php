@extends('layouts.pdf')

@section('content')
<h1 class="text-center">CURRICULUM VITAE</h1>
<h2>Usuario</h2>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Provincia </th>
            <th>Localidad</th>
        </tr>                            
    </thead>
    <tbody>
        <tr>
            <td>{{ $User->dni }}</td>
            <td>{{ $User->name }}</td>
            <td>{{ $User->second_name }}</td>
            <td>{{ $User->provincia }}</td>
            <td>{{ $User->localidad }}</td>
        </tr>
    </tbody>
</table>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Fecha de Nacimiento</th>
            <th>Email</th>
            <th>Vehiculo</th>
        </tr>                            
    </thead>
    <tbody>
        <tr>
            <td>{{ $User->direccion }}</td>
            <td>{{ $User->telefono }}</td>
            <td>{{ $User->fecha_nac }}</td>
            <td>{{ $User->email }}</td>
            <td><?php if ($User->vehiculo ==1){
                echo"Si";
            }else{
                echo"No";
            }?></td>
        </tr>
    </tbody>
</table>

<h2>Experiencias</h2>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Puesto</th>
            <th>Funcion Realizada</th>
            <th>Empresa </th>
            <th>Sector Empresa</th>
            <th>Mes y año de inicio</th>
            <th>Mes y año de Fin</th>
        </tr>                            
    </thead>
    <tbody>
        @foreach($Experiencias as $Experiencia)
        <tr>
            <td>{{ $Experiencia->puesto }}</td>
            <td>{{ $Experiencia->funcion_realizada }}</td>
            <td>{{ $Experiencia->empresa }}</td>
            <td>{{ $Experiencia->sector_empresa }}</td>
            <td>{{ $Experiencia->mes_anyo_inicio }}</td>
            <td>{{ $Experiencia->mes_anyo_fin }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Formaciones</h2>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Grado</th>
            <th>Centro </th>
            <th>Finalizado</th>
            <th>Año de Finalizacion</th>
        </tr>                            
    </thead>
    <tbody>
        @foreach($Formaciones as $formacion)
        <tr>
            <td>{{ $formacion->titulo }}</td>
            <td>{{ $formacion->grado }}</td>
            <td>{{ $formacion->centro }}</td>
            <td><?php if ( $formacion->finalizado ==1){
                echo"Si";
            }else{
                echo"No";
            }?></td>
            <td>{{ $formacion->anyo_finalizacion }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>Idiomas</h2>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Idioma</th>
            <th>Nivel Hablado</th>
            <th>Nivel Escrito</th>
            <th>Titulo Oficial</th>
        </tr>                            
    </thead>
    <tbody>
        @foreach($Idiomas as $Idioma)
        <tr>
            <td>{{ $Idioma->idioma }}</td>
            <td>{{ $Idioma->nivel_hablado }}</td>
            <td>{{ $Idioma->nivel_escrito }}</td>
            <td>{{ $Idioma->titulo_oficial }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection