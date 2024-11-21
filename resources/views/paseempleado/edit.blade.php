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
                <label for="id_motivopase">Motivo del Pase (Ingrese ID)</label>
                <input type="number" name="id_motivopase" id="id_motivopase" class="form-control" value="{{ $paseempleado->id_motivopase }}" required>
            </div>

            <div class="form-group">
                <label for="cijefe">CI Jefe</label>
                <input type="number" name="cijefe" id="cijefe" class="form-control" value="{{ $paseempleado->cijefe }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
