@extends('layouts.app')

@section('content')
@if(session('message')) <div class="alert alert-{{ session('message')[0] }}"> {{ session('message')[1] }} </div> @endif
<div class="row">
	<div class="col-md-8 margenDiv1">
		<div class="col-md-12 col-md-offset-2">
			<a class="titulo1">Usuarios no seleccionados</a>
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
					@foreach($usersInscritos as $user)
					@if($user->seleccionado ==0)
					<tr>
						<td>{{ $user->dni }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->second_name }}</td>
						<td>{{ $user->email }}</td>
						<td> <a role="button" href="{{ url('/PanelAdmin/ListarUsers/Seleccionar', ['id_user' => $user->id_user,'id_oferta'=> $user->id_oferta])}}" class="btn btn-primary btn-xs pull-right">Seleccionar</a></td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="col-md-12 col-md-offset-2">
			<a class="titulo1">Usuarios seleccionados</a>
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>DNI</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Email</th>
					</tr>                            
				</thead>
				<tbody>
					@foreach($usersInscritos as $user)
					@if($user->seleccionado ==1)
					<tr>
						<td>{{ $user->dni }}</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->second_name }}</td>
						<td>{{ $user->email }}</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection