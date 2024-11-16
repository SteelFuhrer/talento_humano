@extends('home')

@section('content')
<h1>Editar Retraso</h1>
<form action="{{ route('retraso.update', $retraso->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="ci">Empleado</label>
        <select name="ci" id="ci" class="form-control" required>
            @foreach ($empleados as $empleado)
                <option value="{{ $empleado->ci }}" {{ $empleado->ci == $retraso->ci ? 'selected' : '' }}>
                    {{ $empleado->nombre_completo }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="idtiporetraso">Tipo de Retraso</label>
        <select name="idtiporetraso" id="idtiporetraso" class="form-control" required>
            @foreach ($tiposRetraso as $tipo)
                <option value="{{ $tipo->idtiporetraso }}" {{ $tipo->idtiporetraso == $retraso->idtiporetraso ? 'selected' : '' }}>
                    {{ $tipo->tipoderetraso }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $retraso->fecha }}" required>
    </div>
    <div class="form-group">
        <label for="minutos">Minutos</label>
        <input type="time" name="minutos" id="minutos" class="form-control" value="{{ $retraso->minutos }}" required>
    </div>
    <div class="form-group">
        <label for="observacion">Observación</label>
        <textarea name="observacion" id="observacion" class="form-control">{{ $retraso->observacion }}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="{{ route('retraso.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
