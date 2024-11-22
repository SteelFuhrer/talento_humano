@extends('home')

@section('content')
    <div class="container">
        <h2>Editar Pase de Empleado</h2>

        <form action="{{ route('paseempleado.update', $paseempleado->idpaseempleado) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="ci">CI Empleado</label>
                <input type="number" name="ci" id="ci" class="form-control" value="{{ $paseempleado->ci }}" required>
            </div>

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
                        <option value="{{ $motivo->id_motivopase }}">{{ $motivo->motivopase }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cijefe">CI Jefe</label>
                <select name="cijefe" id="cijefe" class="form-control" required>
                    <option value="">Seleccione un jefe</option>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->ci }}" {{ $empleado->ci == $paseempleado->cijefe ? 'selected' : '' }}>
                            {{ $empleado->nombre }} <!-- Asegúrate de que 'nombre' sea el campo correcto -->
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
