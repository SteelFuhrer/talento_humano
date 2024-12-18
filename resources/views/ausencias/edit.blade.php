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
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Cambios</button>
                    <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('ausencias.index') }}'">
                        <i class="fa-solid fa-circle-left"></i> Volver
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
