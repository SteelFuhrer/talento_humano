@extends('home')

@section('content')
<div class="container">
    <div class="card" style="margin: 10px; max-width: 1200px; margin: auto;">
        <h2 class="card-header">Editar Horario Asignado</h2>
        <div class="card-body">
            <form action="{{ route('horarioasignado.update', $horarioasignado->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="ci">CI del Empleado</label>
                    <select name="ci" class="form-control" required> 
                        <option value="">Seleccione el empleado</option>
                        @foreach($empleados as $empleado)
                            <option value="{{ $empleado->ci }}" {{ old('ci', $horarioasignado->ci) == $empleado->ci ? 'selected' : '' }}>
                                {{ $empleado->nombre }} {{ $empleado->apellido }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_horario">Horario</label>
                    <select name="id_horario" class="form-control" required> 
                        <option value="">Seleccione el horario</option>
                        @foreach($horarios as $horario)
                            <option value="{{ $horario->id }}" {{ old('id_horario', $horarioasignado->id_horario) == $horario->id ? 'selected' : '' }}>
                                {{ $horario->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="FAsignacion">Fecha de Asignación</label>
                    <input type="date" name="FAsignacion" class="form-control" value="{{ old('FAsignacion', $horarioasignado->FAsignacion) }}" required>
                </div>
                <div class="form-group">
                    <label for="CausaHorario">Causa del Horario</label>
                    <input type="text" name="CausaHorario" class="form-control" value="{{ old('CausaHorario', $horarioasignado->CausaHorario) }}" required>
                </div>
            </form>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('horarioasignado.index') }}'">
                <i class="fa-solid fa-circle-left"></i> Regresar
            </button>
        </div>
    </div>
</div>
@endsection
