@extends('home')

@section('content')

<div class="content" style="margin-left: 20px">
    <h2>Editar Retraso</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title"><b>Actualizar los datos</b></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('retraso.update', $retraso->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Empleado (Autocompletado y deshabilitado) -->
                        <div class="form-group">
                            <label for="ci">Empleado</label>
                            <input type="text" class="form-control" value="{{ $retraso->empleado->nombre_completo }}" disabled>
                            <input type="hidden" name="ci" id="ci" value="{{ $retraso->ci }}">
                        </div>

                        <!-- Tipo de Retraso -->
                        <div class="form-group">
                            <label for="idtiporetraso">Tipo de Retraso</label>
                            <select name="idtiporetraso" id="idtiporetraso" class="form-control" required>
                                @foreach ($tiposRetraso as $tipo)
                                    <option value="{{ $tipo->idtiporetraso }}" {{ $tipo->idtiporetraso == $retraso->idtiporetraso ? 'selected' : '' }}>
                                        {{ $tipo->tipoderetraso }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fecha -->
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $retraso->fecha }}" required>
                        </div>

                        <!-- Minutos (Formato de tiempo) -->
                        <div class="form-group">
                            <label for="minutos">Hora del Retraso</label>
                            <input type="time" name="minutos" id="minutos" class="form-control" value="{{ $retraso->minutos }}" required>
                        </div>

                        <!-- Observación -->
                        <div class="form-group">
                            <label for="observacion">Observación</label>
                            <textarea name="observacion" id="observacion" class="form-control">{{ $retraso->observacion }}</textarea>
                        </div>

                        <!-- Botones -->
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
                        <a href="{{ route('retraso.index') }}" class="btn btn-secondary"><i class="fa-solid fa-circle-left"></i> Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
