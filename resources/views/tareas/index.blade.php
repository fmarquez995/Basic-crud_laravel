@extends('app');
@section('content')


<!--carrousel-->
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('images/images.png')}}"

      Style="display: block;
            margin-left: auto;
            margin-right: auto;
            width: 45%;
            height: 50%;"

      >
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
<!--carrousel-->
<!--texto introducción-->
<p
Style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 38%;
  font-size: 20;"
>Bienvenidos , El siguiente es un CRUD simple , osea, podemos ver toda la selección de registros en una base de datos y hacer todas las operaciones básicas o QUERY's ,osea, select, update (DAR CLICK EN DATOS PARA EDITAR), delete</p>
<!--texto introducción-->


<div class="container w-25 border p-4 mt-4">
<form action="{{route('tareas')}}" method="POST">

    @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>

    @endif

    @error('title')
    <h6 class="alert alert-danger">{{$message}}</h6>

    @enderror

    @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Titulo de la Tarea:</label>
    <input type="text" class="form-control" name="title">
  </div>
  <button type="submit" class="btn btn-primary">Actualizar</button>
</form>


<div>
    @foreach ( $tareas as $tarea )
        <div class="row py-1">
            <div class="col-md-9 d-flex align-items-center">
            <a href="{{route('tareas-edit',['id'=>$tarea->id])}}">{{$tarea->title}}</a>
            </div>

        <div class="col-md-3 d-flex justify-content-end">
            <form action="{{route('tareas-destroy',[$tarea->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
</div>

@endsection
