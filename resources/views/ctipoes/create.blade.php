@extends('home')

@section('content')
<div class="container">
    <h1>Crear Tipo de Entrada/Salida</h1>
    <form action="{{ route('ctipoes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipoes">Tipo de Entrada/Salida</label>
            <input type="text" name="tipoes" class="form-control" maxlength="10" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">
            <i class="fa-solid fa-floppy-disk"></i> Guardar
        </button>
        <button type="button" id="volver" class="btn btn-secondary mt-2" onclick="window.location.href='{{ route('ctipoes.index') }}'">
            <i class="fa-solid fa-circle-left"></i> Volver
        </button>
    </form>
</div>
@endsection

