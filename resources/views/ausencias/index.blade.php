@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Ausencias</h1>
            <a href="ausencias/create" class="btn btn-primary mb-4">Crear Nueva Ausencia</a>
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
                                <a href="" class="btn btn-info">Ver</a>
                                <a href="{{ route('edit_ausencia', $ausencia->id) }}" class="btn btn-primary btn-sm" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
