@extends('home')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Detalle del Tipo de Entrada/Salida</h1>

    <div class="card mt-4">
        <div class="card-header">
            <strong>ID: </strong> {{ $ctipoe->id }}
        </div>
        <div class="card-body">
            <p><strong>Tipo de Entrada/Salida:</strong> {{ $ctipoe->tipoes }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('ctipoes.index') }}" class="btn btn-secondary"><i class="fa-solid fa-circle-left"></i> Volver</a>
            <a href="{{ route('ctipoes.edit', $ctipoe->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
            <form action="{{ route('ctipoes.destroy', $ctipoe->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este tipo?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection

