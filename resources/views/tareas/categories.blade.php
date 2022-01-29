@extends('app');
@section('content')
<div class="container w-25 border p-4 mt-4">
<form action="{{route('categories.store')}}" method="POST">
@csrf
    @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>

    @endif

    @error('name')
    <h6 class="alert alert-danger">{{$message}}</h6>

    @enderror

    @csrf
  <div class="mb-3">
    <label for="color" class="form-label">Color de la Tarea:</label>
    <input type="color" class="form-control" name="color">
  </div>
  <button type="submit" class="btn btn-primary">Crear nueva categoria</button>
</form>


</div>

@endsection
