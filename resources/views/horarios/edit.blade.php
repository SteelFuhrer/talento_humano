@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Horario</h1>
    <form action="{{ route('horarios.update', $horario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $horario->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="hora_entrada">Hora de Entrada</label>
            <input type="time" name="hora_entrada" class="form-control" value="{{ $horario->hora_entrada }}" required>
        </div>
        <div class="form-group">
            <label for="hora_salida">Hora de Salida</label>
            <input type="time" name="hora_salida" class="form-control" value="{{ $horario->hora_salida }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
