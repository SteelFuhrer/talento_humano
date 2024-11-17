@extends('home')

@section('content')
<div class="container">
    <h1>Crear Nueva Ausencia de Empleado</h1>
    <form action="{{ route('empleadoausencia.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="CI">CI</label>
            <select class="form-control" id="CI" name="CI" required>
                @foreach($empleados as $empleado)
                    <option value="{{ $empleado->ci }}">{{ $empleado->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="IdAusencia">IdAusencia</label>
            <select class="form-control" id="IdAusencia" name="IdAusencia" required>
                @foreach($ausencias as $ausencia)
                    <option value="{{ $ausencia->id_ausencia }}">{{ $ausencia->tipoausencia }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="FInicio">Fecha de Inicio</label>
            <input type="date" class="form-control" id="FInicio" name="FInicio" required>
        </div>
        <div class="form-group">
            <label for="FFin">Fecha de Fin</label>
            <input type="date" class="form-control" id="FFin" name="FFin" required>
        </div>
        <div class="form-group">
            <label for="CJefe">CJefe</label>
            <input type="number" class="form-control" id="CJefe" name="CJefe" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('empleadoausencia.index') }}'">
            <i class="fa-solid fa-circle-left"></i> Volver
        </button>
    </form>
</div>
@endsection
