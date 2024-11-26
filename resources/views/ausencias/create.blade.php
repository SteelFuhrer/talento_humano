@extends('home')

@section('content')
<div class="container">
    <h2 class="card-header">Registrar tipo de ausencia</h2>
    <div class="card card-outline card-success" style="margin: 10px; max-width: 1200px; margin: auto;">
        <div class="card-header">
            <p><strong> Ingrese los datos </strong></p>
        </div>
        <div class="card-body">
        <form action="{{ route('ausencias.store') }}" method="POST">
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
                <label for="tipoausencia">Tipo de Ausencia</label>
                <input type="text" class="form-control" id="tipoausencia" name="tipoausencia" required>
            </div>
        </div>
        <div class="card-footer">  
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                <button type="button" id="regresar" class="btn btn-secondary" onclick="window.location.href='{{ route('ausencias.index') }}'">
                    <i class="fa-solid fa-circle-left"></i> Regresar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
