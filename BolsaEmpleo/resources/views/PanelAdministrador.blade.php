@extends('layouts.app')

@section('content')
@if(session('message')) <div class="alert alert-{{ session('message')[0] }}"> {{ session('message')[1] }} </div> @endif
<div class="row">
	<div class="col-md-12 margenDiv1">
		<div class="col-md-10 col-md-offset-1">
			<a class="titulo1">Usuarios pendientes de activar</a>
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>DNI</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Email</th>
						<th></th>
					</tr>                            
				</thead>
				<tbody>
					@foreach($users as $user)
					@if ($user->confirmed == 0)
					<tr>
						<td>{{ $user->dni }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->second_name }}</td>
						<td>{{ $user->email }}</td>
						<td> <a role="button" href="{{ url('/PanelAdmin/ActivarCuenta/' . $user->id) }}" class="btn btn-primary btn-xs pull-right">Activar</a></td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-12 margenDiv1">
		<div class="col-md-10 col-md-offset-1">
			<form class="form-horizontal" method="POST" action="PanelAdmin/ExportarCurriculums" enctype="multipart/form-data">
				{{ csrf_field() }}
				<a class="titulo1">Usuarios activos</a>
				<button type="submit" class="btn btn-success" value="ExportarC">Exportar Curriculum</button>
				<a type="button" data-toggle="modal" data-target="#pdfs" class="btn btn-primary">
					Informes
				</a>
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>DNI</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Email</th>
							<th>PDF</th>
							<th></th>
							<th></th>
						</tr>                            
					</thead>
					<tbody>
						@foreach($users as $user)
						@if ($user->confirmed == 1)
							@if ($user->tipo == 1)
							<tr>
								<td>{{ $user->dni }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->second_name }}</td>
								<td>{{ $user->email }}</td>
								<td></td>
								<td> <a role="button" href="{{ url('/PanelAdmin/DeshacerAdmin/' . $user->id) }}" class="botonAdmin btn btn-warning btn-xs pull-right">Deshacer Admin</a></td>
							</tr>
							@else
							<tr>
								<td>{{ $user->dni }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->second_name }}</td>
								<td>{{ $user->email }}</td>
								<td><input name="pdf" value="0" type="hidden"/>
	                            <input id="pdf" type="checkbox" class="form-check-input" name="pdfs[]" value="{{$user->id}}" /></td>
	                            <td> <a role="button" href="{{ url('/PanelAdmin/HacerAdmin/' . $user->id) }}" class="btn btn-primary btn-xs pull-right">Hacer Admin</a></td>
								<td> <a role="button" href="{{ url('/PanelAdmin/BorrarUser/' . $user->id) }}" class="btn btn-danger btn-xs pull-right">Eliminar</a></td>
							</tr>
							@endif
						@endif
						@endforeach
					</tbody>
				</table>
			</form>
		</div>
	</div>
	<div class="col-md-12 margenDiv1">
		<div class="col-md-10 col-md-offset-1">
			<a class="titulo1">Ofertas Activas</a>
			<button type="submit" data-toggle="modal" data-target="#insertarOferta" class="btn btn-info">
				Insertar Oferta
			</button>
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>titulo</th>
						<th>empresa</th>
						<th>sector</th>
						<th>fecha_limite</th>
						<th></th>
					</tr>                            
				</thead>
				<tbody>
					@foreach($ofertasAct as $oferta)
					<tr>
						<td>{{ $oferta->titulo }}</td>
						<td>{{ $oferta->empresa }}</td>
						<td>{{ $oferta->sector }}</td>
						<td>{{ $oferta->fecha_limite }}</td>
						<td>
							<a 
							role="button" 
							data-toggle="modal"
							data-id="{{$oferta->id}}"
							data-tit="{{$oferta->titulo}}"
							data-des="{{$oferta->descripcion}}"
							data-emp="{{$oferta->empresa}}"
							data-sec="{{$oferta->sector}}"
							data-fech="{{$oferta->fecha_limite}}"
							data-target="#editarOferta" 
							class="btnEditar editarOferta btn btn-primary btn-xs pull-right">Editar</a>
							<a role="button" href="{{ url('/PanelAdmin/ListarUsers/' . $oferta->id) }}" class="btnSeleccionar btn btn-warning btn-xs pull-right">Seleccionar Usuario</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-12 margenDiv1">
		<div class="col-md-10 col-md-offset-1">
			<a class="titulo1">Ofertas no Activas</a>
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>titulo</th>
						<th>empresa</th>
						<th>sector</th>
						<th>fecha_limite</th>
						<th></th>
					</tr>                            
				</thead>
				<tbody>
					@foreach($ofertasnoAct as $oferta)
					<tr>
						<td>{{ $oferta->titulo }}</td>
						<td>{{ $oferta->empresa }}</td>
						<td>{{ $oferta->sector }}</td>
						<td>{{ $oferta->fecha_limite }}</td>
						<td>
							<a role="button" href="{{ url('/PanelAdmin/BorrarOferta/' . $oferta->id) }}" class="btn btn-danger btn-xs pull-right">Eliminar</a>
							<a 
							role="button" 
							data-toggle="modal"
							data-id="{{$oferta->id}}"
							data-tit="{{$oferta->titulo}}"
							data-des="{{$oferta->descripcion}}"
							data-emp="{{$oferta->empresa}}"
							data-sec="{{$oferta->sector}}"
							data-fech="{{$oferta->fecha_limite}}"
							data-target="#editarOferta" 
							class="btnEditar editarOferta btn btn-primary btn-xs pull-right">Editar</a>
							<a role="button" href="{{ url('/PanelAdmin/ListarUsers/' . $oferta->id) }}" class="btnSeleccionar btn btn-warning btn-xs pull-right">Seleccionar Usuario</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">

	//Evitar que se creen varias ofertas

	function checkSubmitOferta() {
        document.getElementById("botonO").value = "Enviando...";
        document.getElementById("botonO").disabled = true;
        return true;
    }

	//Codigo js para que cargue los datos en la modal de Oferta

	$(document).on('click', '.editarOferta', function() {
		$('#idOfertaE').val($(this).data('id'));
		$('#tituloE').val($(this).data('tit'));
		$('#descripcionE').val($(this).data('des'));
		$('#empresaE').val($(this).data('emp'));
		$('#sectorE').val($(this).data('sec'));
		$('#fecha_limiteE').val($(this).data('fech'));
	});
</script>

@include('modals.Informes')
@include('modals.editarOferta')
@include('modals.insertarOferta')
@endsection