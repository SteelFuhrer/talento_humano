@extends('home')

@section('content')
    <div class="container">
        <h2>Detalles del Pase de Empleado</h2>

        <table class="table">
            <tr>
                <th>ID Pase</th>
                <td>{{ $paseempleado->idpaseempleado }}</td>
            </tr>
            <tr>
                <th>CI Empleado</th>
                <td>{{ $paseempleado->ci }}</td>
            </tr>
            <tr>
                <th>Fecha</th>
                <td>{{ $paseempleado->fecha }}</td>
            </tr>
            <tr>
                <th>Hora de Salida</th>
                <td>{{ $paseempleado->hsalida }}</td>
            </tr>
            <tr>
                <th>Hora de Entrada</th>
                <td>{{ $paseempleado->hentrada }}</td>
            </tr>
            <tr>
                <th>Lugar</th>
                <td>{{ $paseempleado->lugar }}</td>
            </tr>
            <tr>
                <th>Motivo Pase</th>
                <td>{{ $paseempleado->id_motivopase }}</td>
            </tr>
            <tr>
                <th>CI Jefe</th>
                <td>{{ $paseempleado->cijefe }}</td>
            </tr>
        </table>
    </div>
@endsection
