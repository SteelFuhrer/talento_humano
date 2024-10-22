@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Editar Ausencia</h1>
            <form action="{{ route('ausencias.update', ['ausencia' => $ausencia->id_ausencia]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tipoausencia">Tipo de Ausencia</label>
                    <input type="text" class="form-control" id="tipoausencia" name="tipoausencia" value="{{ $ausencia->tipoausencia }}" required>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="{{ route('ausencias.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
