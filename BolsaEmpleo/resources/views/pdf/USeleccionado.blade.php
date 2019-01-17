@extends('layouts.pdf')

@section('content')
<h1 class="text-center">USUARIOS SELECCIONADOS</h1>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Empresa </th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Sector</th>
        </tr>                            
    </thead>
    <tbody>
        @foreach($Users as $User)
        <tr>
            <td>{{ $User->empresa }}</td>
            <td>{{ $User->name }}</td>
            <td>{{ $User->second_name }}</td>
            <td>{{ $User->sector }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection