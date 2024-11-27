@extends('home')

@section('content')

<div class="content" style="margin-left: 20px">
    <h2>Registrar Retraso</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Ingrese los datos</b></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('retraso.store') }}" method="POST">
                        @csrf
                        <!-- Empleado -->
                        <div class="form-group">
                            <input type="text" name="ci" id="ci" class="form-control"
                            value="{{ Auth::user()->empleado?->ci}}" hidden>    
                        </div>

                        <!-- Tipo de Retraso -->
                        <div class="form-group">
                            <label for="idtiporetraso">Tipo de Retraso</label>
                            <select name="idtiporetraso" id="idtiporetraso" class="form-control" required>
                                <option value="">Seleccione un tipo de retraso</option>
                                @foreach ($tiposRetraso as $tipo)
                                    <option value="{{ $tipo->idtiporetraso }}">{{ $tipo->tipoderetraso }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fecha -->
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" name="fecha" id="fecha" class="form-control" required>
                        </div>

                        <!-- Minutos (Formato de tiempo) -->
                        <div class="form-group">
                            <label for="minutos">Hora del Retraso</label>
                            <input type="time" name="minutos" id="minutos" class="form-control" required>
                        </div>

                        <!-- Observación -->
                        <div class="form-group">
                            <label for="observacion">Observación</label>
                            <textarea name="observacion" id="observacion" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- Botones -->
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                        <a href="{{ route('retraso.index') }}" class="btn btn-secondary"><i class="fa-solid fa-circle-left"></i> Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
