@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Ausencias</h1>
            <a href="{{ route('ausencias.create') }}" class="btn btn-primary mb-4">Crear Nueva Ausencia</a>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Tipo de Ausencia</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ausencias as $ausencia)
                        <tr>
                            <td>{{ $ausencia->tipoausencia }}</td>
                            <td>
                                <a href="{{ route('ausencias.show', ['ausencia' => $ausencia->id_ausencia]) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('ausencias.edit', ['ausencia' => $ausencia->id_ausencia]) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('ausencias.destroy', ['ausencia' => $ausencia->id_ausencia]) }}" method="POST" style="display:inline;">
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
    </div>
</div>
@endsection
