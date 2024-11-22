@extends('home')

@section('content')
    <div class="container">
        <h2>Nuevo Pase de Empleado</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('paseempleado.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="ci">CI Empleado</label>
                <input type="number" name="ci" id="ci" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hsalida">Hora de Salida</label>
                <input type="datetime-local" name="hsalida" id="hsalida" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="hentrada">Hora de Entrada</label>
                <input type="datetime-local" name="hentrada" id="hentrada" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="lugar">Lugar</label>
                <input type="text" name="lugar" id="lugar" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="id_motivopase">Motivo del Pase</label>
                <select name="id_motivopase" id="id_motivopase" class="form-control" required>
                    <option value="">Seleccione un tipo de pase</option>
                    @foreach($motivospase as $motivo)
                    <option value="{{ $motivo->id_motivopase }}">{{ $motivo->motivopase }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cijefe">CI Jefe</label>
                <select name="cijefe" id="cijefe" class="form-control" required>
                    <option value="">Seleccione el Jefe</option>
                    @foreach ($empleados as $empleado)
                <option value="{{ $empleado->ci }}">{{ $empleado->nombre_completo }}</option>
            @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('paseempleado.index') }}'">
                <i class="fa-solid fa-circle-left"></i> Volver
            </button>
        </form>
    </div>
@endsection
