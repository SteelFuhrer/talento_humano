@extends('home')

@section('content')
<h1>Retrasos Reportados</h1>

<a href="{{ route('retraso.create') }}" class="btn btn-primary">Reportar Retraso</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Empleado</th>
            <th>Tipo de Retraso</th>
            <th>Fecha</th>
            <th>Minutos</th>
            <th>Observación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($retrasos as $retraso)
        <tr>
            <td>{{ $retraso->id }}</td>
            <td>{{ $retraso->empleado->nombre_completo }}</td>
            <td>{{ $retraso->tipoRetraso->tipoderetraso }}</td>
            <td>{{ $retraso->fecha }}</td>
            <td>{{ $retraso->minutos }}</td>
            <td>{{ $retraso->observacion }}</td>
            <td>
                <a href="{{ route('retraso.edit', $retraso->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('retraso.destroy', $retraso->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
