@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Horarios</h1>
    <a href="{{ route('horarios.create') }}" class="btn btn-primary">Crear Horario</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Hora de Entrada</th>
                <th>Hora de Salida</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horarios as $horario)
            <tr>
                <td>{{ $horario->nombre }}</td>
                <td>{{ date('g:i A', strtotime($horario->hora_entrada)) }}</td>
                <td>{{ date('g:i A', strtotime($horario->hora_salida)) }}</td>
                <td>
                    <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
