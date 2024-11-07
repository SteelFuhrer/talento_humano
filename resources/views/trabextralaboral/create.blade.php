@extends('home')

@section('content')
<div class="container">
    <h1>Crear Nuevo Trabajo Extra Laboral</h1>
    <form action="{{ route('trabextralaboral.store') }}" method="POST">
        @csrf
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-group">
            <label for="descripciontrab">Descripcion del Trabajo</label>
            <input type="text" name="descripciontrab" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hini">Hora de Inicio</label>
            <input type="datetime-local" name="hini" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="hfin">Hora de Fin</label>
            <input type="datetime-local" name="hfin" class="form-control"  required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('trabextralaboral.index') }}'">
            <i class="fa-solid fa-circle-left"></i> Volver
        </button>
    </form>
</div>
@endsection
