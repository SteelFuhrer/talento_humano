@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Ausencia</h1>
    <form action="{{ route('ausencias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tipoausencia">Tipo de Ausencia</label>
            <input type="text" name="tipoausencia" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
