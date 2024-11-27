@extends('home')

@section('content')

    <style>
        .form-section {
            margin-bottom: 20px;
        }

        .form-section-title {
            background-color: #f4f6f9;
            padding: 10px;
            border-left: 5px solid #007bff;
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .card-custom {
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            border-radius: 20px;
        }
    </style>

    <div class="container">
        <div class="card card-outline card-success card-custom">
            <div class="card-header">
                <h3 class="card-title"><b>Editar Pase de Empleado</b></h3>
            </div>
            <div class="card-body">
                <form action="{{ route('paseempleado.update', $paseempleado->idpaseempleado) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Sección: Datos del Empleado -->
                    <div class="form-section">
                        <div class="form-section-title">Datos del Empleado</div>
                        <div class="form-group">
                            <label for="ci">Empleado</label>
                            <input type="text" class="form-control" value="{{ $paseempleado->empleado->nombre }}" disabled>
                            <input type="hidden" name="ci" id="ci" value="{{ $paseempleado->ci }}">
                        </div>
                    </div>

                    <!-- Sección: Detalles del Pase -->
                    <div class="form-section">
                        <div class="form-section-title">Detalles del Pase</div>
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $paseempleado->fecha }}" required>
                        </div>

                        <div class="form-group">
                            <label for="hsalida">Hora de Salida</label>
                            <input type="datetime-local" name="hsalida" id="hsalida" class="form-control" value="{{ $paseempleado->hsalida }}" required>
                        </div>

                        <div class="form-group">
                            <label for="hentrada">Hora de Entrada</label>
                            <input type="datetime-local" name="hentrada" id="hentrada" class="form-control" value="{{ $paseempleado->hentrada }}" required>
                        </div>

                        <div class="form-group">
                            <label for="lugar">Lugar</label>
                            <input type="text" name="lugar" id="lugar" class="form-control" value="{{ $paseempleado->lugar }}" required>
                        </div>

                        <div class="form-group">
                            <label for="id_motivopase">Motivo del Pase</label>
                            <select name="id_motivopase" id="id_motivopase" class="form-control" required>
                                <option value="">Seleccione un tipo de pase</option>
                                @foreach($motivospase as $motivo)
                                    <option value="{{ $motivo->id_motivopase }}" {{ $motivo->id_motivopase == $paseempleado->id_motivopase ? 'selected' : '' }}>
                                        {{ $motivo->motivopase }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Sección: Autorización -->
                    <div class="form-section">
                        <div class="form-section-title">Autorización</div>
                        <div class="form-group">
                            <label for="cijefe">Jefe que autoriza</label>
                            <select name="cijefe" id="cijefe" class="form-control" required>
                                <option value="">Seleccione un jefe</option>
                                @foreach($empleados as $empleado)
                                    <option value="{{ $empleado->ci }}" {{ $empleado->ci == $paseempleado->cijefe ? 'selected' : '' }}>
                                        {{ $empleado->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-custom">
                            <i class="fa-solid fa-floppy-disk"></i> Actualizar
                        </button>
                        <button type="button" id="volver" class="btn btn-secondary btn-custom" onclick="window.location.href='{{ route('paseempleado.index') }}'">
                            <i class="fa-solid fa-circle-left"></i> Volver
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
