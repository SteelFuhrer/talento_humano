@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Detalles de la Solicitud de Ausencia</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CI: {{ $empleadoAusencia->CI }}</h5>
                    <p class="card-text">
                        <strong>Nombre del Empleado:</strong> {{ $empleadoAusencia->empleado->nombre }}
                    </p>
                    <p class="card-text">
                        <strong>Tipo de Ausencia:</strong> {{ $empleadoAusencia->ausencia->tipoausencia }}
                    </p>
                    <p class="card-text">
                        <strong>Fecha de Inicio:</strong> {{ $empleadoAusencia->FInicio }}
                    </p>
                    <p class="card-text">
                        <strong>Fecha de Fin:</strong> {{ $empleadoAusencia->FFin }}
                    </p>
                    <p class="card-text">
                        <strong>CJefe:</strong> {{ $empleadoAusencia->CJefe }}
                    </p>
                    <p class="card-text">
                        <strong>Estado:</strong> {{ $empleadoAusencia->estado == 1 ? 'Aprobada' : 'No Aprobada' }}
                    </p>
                    <div class="mt-4">
                        <a href="{{ route('adminausencia.edit', $empleadoAusencia->IdEmpleadoAusencia) }}" class="btn btn-primary">
                            <i class="fa-solid fa-pen-to-square"></i> Editar
                        </a>
                        <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('adminausencia.index') }}'">
                            <i class="fa-solid fa-circle-left"></i> Volver
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
