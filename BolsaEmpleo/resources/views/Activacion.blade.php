@extends('layouts.app')

@section('content')
@if(session('message')) <div class="alert alert-{{ session('message')[0] }}"> {{ session('message')[1] }} </div> @endif
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Activacion</div>

				<div class="panel-body">
					<a class="Act">Espere que el admnistrador active su cuenta</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

