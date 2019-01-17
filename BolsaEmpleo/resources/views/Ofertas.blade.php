@extends('layouts.app')

@section('content')
@if(session('message')) <div class="alert alert-{{ session('message')[0] }}"> {{ session('message')[1] }} </div> @endif

<div class="row">
 <div class="col-md-8 margenDiv2 col-md-offset-3">
  <form class="form-horizontal" method="POST" action="{{route('BuscarOfertas')}}">
    {{ csrf_field() }}
    <select class="js-example-placeholder-multiple js-sectores" name="sectores[]" multiple="multiple">
     @foreach($sectores as $sector)
     <option value="{{$sector->nombre}}">{{$sector->nombre}}</option>
     @endforeach
   </select>
   <button type="submit" class="btn btn-info">Buscar</button>
 </form>
 <br/>
</div>
<div class="col-md-8 margenDiv2 col-md-offset-2">
  @if($ofertas!=null)
  @forelse($ofertas as $oferta)
  <div class="panel panel-default ">
    <div class="panel-heading panel-heading-ofertas">
      <a> {{ $oferta->titulo }} </a>
      <span class="pull-right">
        {{ __("Empresa") }}: {{ $oferta->empresa}}
      </span>
    </div>
    <div class="panel-body">
      {{ $oferta->descripcion }}
    </div>
    <div class="panel-footer">
      {{ __("Sector") }}:{{ $oferta->sector }}
      <span class="pull-right">
        <a href="{{ url('/PanelUsuario/Ofertas/InscribirseOferta/' . $oferta->id) }}" role="button" class="btn btn-success btn-sm">Inscribirse</a>
      </span>
    </div>
  </div>
  @empty
  <div class="alert alert-danger">
    {{ __("No hay ninguna oferta en este momento") }}
  </div>
  @endforelse
  @endif
</div>
</div>

<script type="text/javascript">

  //Inicializacion del plugin para seleccionar varios campos y placeholder.

  $(document).ready(function() {
    $(".js-example-placeholder-multiple").select2({
      placeholder: "Selecciona los sectores en los que esta interesado"
    });
  });
</script>
@endsection

