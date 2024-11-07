@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Editar Trabajo Extralaboral</h1>
            <form action="{{ route('trabextralaboral.update', ['trabextralaboral' => $trabextralaboral->idtrabextralaboral]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="descripciontrab">Descripcion</label>
                    <input type="text" class="form-control" id="descripciontrab" name="descripciontrab" value="{{ $trabextralaboral->descripciontrab }}" required>
                </div>
                <div class="form-group">
                    <label for="hini">Hora de Inicio</label>
                    <input type="datetime-local" id="hini" name="hini" class="form-control" value="{{$trabextralaboral->hini}}" required>
                </div>
                <div class="form-group">
                    <label for="hfin">Hora de Fin</label>
                    <input type="datetime-local" id="hfin" name="hfin" class="form-control" value="{{$trabextralaboral->hfin}}" required>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar Cambios</button>
                    <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('trabextralaboral.index') }}'">
                        <i class="fa-solid fa-circle-left"></i> Volver
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
