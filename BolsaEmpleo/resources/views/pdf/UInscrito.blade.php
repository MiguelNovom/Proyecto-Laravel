@extends('layouts.pdf')

@section('content')
<h1 class="text-center">USUARIOS INSCRITOS</h1>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Nombre </th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Telefono </th>
            <th>Sector</th>
        </tr>                            
    </thead>
    <tbody>
        @foreach($Users as $User)
        <tr>
            <td>{{ $User->name }}</td>
            <td>{{ $User->second_name }}</td>
            <td>{{ $User->email }}</td>
            <td>{{ $User->telefono }}</td>
            <td>{{ $User->sector }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection