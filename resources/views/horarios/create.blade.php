@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Horario</h1>
    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hora_entrada">Hora de Entrada</label>
            <input type="time" name="hora_entrada" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hora_salida">Hora de Salida</label>
            <input type="time" name="hora_salida" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
