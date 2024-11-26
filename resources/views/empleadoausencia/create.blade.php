@extends('home')

@section('content')
<div class="container">
    <h2>Registrar nueva ausencia</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Ingrese los datos</b></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('empleadoausencia.store') }}" method="POST">
                        @csrf
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" name="CI" id="CI" class="form-control"
                                value="{{ Auth::user()->empleado?->ci}}" hidden>
                        </div>
                        <div class="form-group">
                            <label for="IdAusencia">Motivo de ausencia</label>
                            <select class="form-control" id="IdAusencia" name="IdAusencia" required>
                                <option value="">Seleccione un motivo</option>
                                @foreach($ausencias as $ausencia)
                                    <option value="{{ $ausencia->id_ausencia }}">{{ $ausencia->tipoausencia }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="FInicio">Fecha de Inicio</label>
                            <input type="date" class="form-control" id="FInicio" name="FInicio" required>
                        </div>
                        <div class="form-group">
                            <label for="FFin">Fecha de Fin</label>
                            <input type="date" class="form-control" id="FFin" name="FFin" required>
                        </div>
                        <div class="form-group">
                            <label>Jefe que autoriza</label>
                            <input type="text" id="jefe_nombre" class="form-control" 
                            value="{{ $jefe->nombre ?? 'Sin jefe asignado' }} {{ $jefe->apellido ?? '' }}" 
                            disabled>
                            <input type="text" id="CJefe" name="CJefe" value="{{ $jefe->ci ?? 0 }}" hidden>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                        <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('empleadoausencia.index') }}'">
                            <i class="fa-solid fa-circle-left"></i> Volver
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
