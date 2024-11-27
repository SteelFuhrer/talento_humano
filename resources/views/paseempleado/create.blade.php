@extends('home')

@section('content')
<div class="container">
    <h2>Nuevo Pase de Empleado</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Ingrese los datos</b></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('paseempleado.store') }}" method="POST">
                        @csrf
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- CI oculto -->
                        <div class="form-group">
                            <input type="hidden" name="ci" id="ci" value="{{ Auth::user()->empleado?->ci }}">
                        </div>

                        <!-- Fecha -->
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" required>
                        </div>

                        <!-- Hora de salida -->
                        <div class="form-group">
                            <label for="hsalida">Hora de Salida</label>
                            <input type="datetime-local" name="hsalida" id="hsalida" class="form-control" required>
                        </div>

                        <!-- Hora de entrada -->
                        <div class="form-group">
                            <label for="hentrada">Hora de Entrada</label>
                            <input type="datetime-local" name="hentrada" id="hentrada" class="form-control" required>
                        </div>

                        <!-- Lugar -->
                        <div class="form-group">
                            <label for="lugar">Lugar</label>
                            <input type="text" name="lugar" id="lugar" class="form-control" required>
                        </div>

                        <!-- Motivo del Pase -->
                        <div class="form-group">
                            <label for="id_motivopase">Motivo del Pase</label>
                            <select class="form-control" id="id_motivopase" name="id_motivopase" required>
                                <option value="">Seleccione un motivo</option>
                                @foreach($motivospase as $motivo)
                                    <option value="{{ $motivo->id_motivopase }}">{{ $motivo->motivopase }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jefe que autoriza -->
                        <div class="form-group">
                            <label for="cijefe">Jefe que autoriza</label>
                            <select name="cijefe" id="cijefe" class="form-control" required>
                                <option value="">Seleccione un jefe</option>
                                @foreach($empleados as $empleado)
                                    <option value="{{ $empleado->ci }}" {{ old('cijefe') == $empleado->ci ? 'selected' : '' }}>
                                        {{ $empleado->nombre }} {{ $empleado->apellido }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Botones -->
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                        <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('paseempleado.index') }}'">
                            <i class="fa-solid fa-circle-left"></i> Volver
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
