@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Tipos de Entradas y Salidas</h1>
            <a href="{{ route('ctipoes.create') }}" class="btn btn-primary mb-4">Crear Nuevo Tipo</a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-2">
                    {{ $message }}
                </div>
            @endif

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo de Entrada/Salida</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ctipoes as $ctipoe)
                        <tr>
                            <td>{{ $ctipoe->id }}</td>
                            <td>{{ $ctipoe->tipoes }}</td>
                            <td style="width:120px;">
                                <a href="{{ route('ctipoes.edit', $ctipoe->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('ctipoes.destroy', $ctipoe->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este tipo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
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

