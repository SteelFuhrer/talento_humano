@extends('home')
@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h2>Resultados de Asistencia</h2>
                <p><strong>Rango: </strong> {{ $fechaInicio }} @if ($fechaInicio != $fechaFin) - {{ $fechaFin }} @endif</p>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($asistencias as $asistencia)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($asistencia->fechahora)->format('Y-m-d') }}</td>
                                <td>{{ $asistencia->tipoAsistencia->tipoes }}</td>
                                <td>{{ \Carbon\Carbon::parse($asistencia->fechahora)->format('H:i:s') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No hay registros de asistencia para este rango de fechas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <br>
                <a href="{{ route('asistencia.form') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
