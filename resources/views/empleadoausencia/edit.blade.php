@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Editar Ausencia de Empleado</h1>
            <form action="{{ route('empleadoausencia.update', ['IdEmpleadoAusencia' => $empleadoAusencia->IdEmpleadoAusencia]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="CI">CI</label>
                    <select class="form-control" id="CI" name="CI" required>
                        @foreach($empleados as $empleado)
                            <option value="{{ $empleado->ci }}" {{ $empleado->ci == $empleadoAusencia->CI ? 'selected' : '' }}>
                                {{ $empleado->ci }} - {{ $empleado->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="IdAusencia">IdAusencia</label>
                    <select class="form-control" id="IdAusencia" name="IdAusencia" required>
                        @foreach($ausencias as $ausencia)
                            <option value="{{ $ausencia->id_ausencia }}" {{ $ausencia->id_ausencia == $empleadoAusencia->IdAusencia ? 'selected' : '' }}>
                                {{ $ausencia->id_ausencia }} - {{ $ausencia->tipoausencia }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="FInicio">Fecha de Inicio</label>
                    <input type="date" class="form-control" id="FInicio" name="FInicio" value="{{ $empleadoAusencia->FInicio }}" required>
                </div>
                <div class="form-group">
                    <label for="FFin">Fecha de Fin</label>
                    <input type="date" class="form-control" id="FFin" name="FFin" value="{{ $empleadoAusencia->FFin }}" required>
                </div>
                <div class="form-group">
                    <label for="CJefe">CJefe</label>
                    <input type="number" class="form-control" id="CJefe" name="CJefe" value="{{ $empleadoAusencia->CJefe }}" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <select class="form-control" id="estado" name="estado">
                        <option value="1" {{ $empleadoAusencia->estado == 1 ? 'selected' : '' }}>Aprobado</option>
                        <option value="0" {{ $empleadoAusencia->estado == 0 ? 'selected' : '' }}>No Aprobado</option>
                    </select>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar Cambios
                    </button>
                    <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('empleadoausencia.index') }}'">
                        <i class="fa-solid fa-circle-left"></i> Volver
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

