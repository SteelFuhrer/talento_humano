@extends('home')

@section('content')

<h1>Registrar Retraso</h1>

<form action="{{ route('retraso.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="ci">Empleado</label>
        <select name="ci" id="ci" class="form-control" required>
            <option value="">Seleccione un empleado</option>
            @foreach ($empleados as $empleado)
                <option value="{{ $empleado->ci }}">{{ $empleado->nombre_completo }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="idtiporetraso">Tipo de Retraso</label>
        <select name="idtiporetraso" id="idtiporetraso" class="form-control" required>
            <option value="">Seleccione un tipo de retraso</option>
            @foreach ($tiposRetraso as $tipo)
                <option value="{{ $tipo->idtiporetraso }}">{{ $tipo->tipoderetraso }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="minutos">Minutos</label>
        <input type="time" name="minutos" id="minutos" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="observacion">Observación</label>
        <textarea name="observacion" id="observacion" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('retraso.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection

