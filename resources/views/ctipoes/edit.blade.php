@extends('home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Editar Tipo de Entrada/Salida</h1>

            
            <form action="{{ route('ctipoes.update', $ctipoe->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="tipoes">Tipo de Entrada/Salida</label>
                    <input type="text" name="tipoes" value="{{ $ctipoe->tipoes }}" class="form-control" maxlength="10" required>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Guardar Cambios
                    </button>
                    <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('ctipoes.index') }}'">
                        <i class="fa-solid fa-circle-left"></i> Volver
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



