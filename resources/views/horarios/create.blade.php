@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin: 10px; max-width: 1200px; margin: auto;">
        <h2 class="card-header">Crear Horario</h2>
        <div class="card-body">
            <form action="{{ route('horarios.store') }}" method="POST">
                @csrf
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                </div>
                <div class="form-group">
                    <label for="hora_entrada">Hora de Entrada</label>
                    <input type="time" name="hora_entrada" class="form-control" value="{{ old('hora_entrada') }}" required>
                </div>
                <div class="form-group">
                    <label for="hora_salida">Hora de Salida</label>
                    <input type="time" name="hora_salida" class="form-control" value="{{ old('hora_salida') }}" required>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Crear</button>
            <button type="button" id="regresar" class="btn btn-secondary" onclick="window.location.href='{{ route('horarios.index') }}'">
                <i class="fa-solid fa-circle-left"></i> Regresar
            </button>
            </form>
        </div>
    </div>
</div>
@endsection
