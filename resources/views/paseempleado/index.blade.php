@extends('home')

@section('content')
    <div class="container">
        <h2>Listado de Pases de Empleados</h2>

        <a href="{{ route('paseempleado.create') }}" class="btn btn-primary">Nuevo Pase</a>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID Pase</th>
                    <th>CI Empleado</th>
                    <th>Fecha</th>
                    <th>Hora de Salida</th>
                    <th>Hora de Entrada</th>
                    <th>Lugar</th>
                    <th>Motivo Pase</th>
                    <th>CI Jefe</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pases as $pase)
                    <tr>
                        <td>{{ $pase->idpaseempleado }}</td>
                        <td>{{ $pase->ci }}</td>
                        <td>{{ $pase->fecha }}</td>
                        <td>{{ $pase->hsalida }}</td>
                        <td>{{ $pase->hentrada }}</td>
                        <td>{{ $pase->lugar }}</td>
                        <td>
                            @foreach ($motivospase as $motivo)
                                @if ($motivo->id_motivopase == $pase->id_motivopase)
                                    {{ $motivo->motivopase }} 
                                @endif
                            @endforeach
                        </td>
                          <!-- Buscar y mostrar el nombre del jefe asociado al cijefe -->
                        <td>
                            @foreach ($empleados as $empleado)
                                @if ($empleado->ci == $pase->cijefe)
                                    {{ $empleado->nombre }} <!-- Asegúrate de que la propiedad del nombre sea la correcta -->
                                @endif
                            @endforeach
                        </td>

                        <td>
                            <a href="{{ route('paseempleado.edit', $pase->idpaseempleado) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('paseempleado.destroy', $pase->idpaseempleado) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
