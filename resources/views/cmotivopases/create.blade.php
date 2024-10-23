@extends('home')

@section('content')
<div class="container">
    <h1>Crear Nuevo Motivo Pase</h1>
    <form action="{{ route('cmotivopases.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="motivopase">Motivo Pase</label>
            <input type="text" name="motivopase" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('ausencias.index') }}'">
            <i class="fa-solid fa-circle-left"></i> Volver
        </button>
    </form>
</div>
@endsection
