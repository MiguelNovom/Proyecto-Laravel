@extends('layouts.pdf')

@section('content')
<h1 class="text-center">OFERTAS DE EMPLEO</h1>
<table class="table table-hover table-striped">
    <thead>
        <tr>
           <th>Sector</th>
           <th>Titulo </th>
           <th>Empresa</th>
           <th>Fecha_limite</th>
       </tr>                            
   </thead>
   <tbody>
    @foreach($Ofertas as $Oferta)
    <tr>
        <td>{{ $Oferta->sector }}</td>
        <td>{{ $Oferta->titulo }}</td>
        <td>{{ $Oferta->empresa }}</td>
        <td>{{ $Oferta->fecha_limite }}</td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection