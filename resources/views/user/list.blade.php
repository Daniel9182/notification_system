@extends('user.home')

@section('content')
@foreach ($type as $tipo)
@if ($tipo->id == 2)
<button type="button" class="btn btn-success" onclick="obtenerValor({{$notification->id}})" data-toggle="modal" data-target="#AddPost">Add post </button>
@endif
@endforeach
<br>
<h1>{{$notification->name}}</h1>
    <div class="row">
      @if (count($data)>0)
      
        @foreach ($data as $item)
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$item->title}}</h5>
              <p class="card-text">{{$item->description}}</p>
              <a href="{{route('view.post', ['id' => $item->id])}}" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        @endforeach
        @else
            <div>
              <h4>No data has been found</h4>
            </div>
        @endif
      </div>

<script>
    
  function obtenerValor(elemento) {
    var valor = elemento;
    let campo = document.getElementById('tipopost');
    campo.value = valor;
  }
</script>
@endsection

