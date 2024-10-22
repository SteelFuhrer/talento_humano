@extends('home')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-4">Crear Nueva Ausencia</h1>
                <form action="{{ route('new_ausencia') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tipoausencia">Tipo de Ausencia</label>
                        <input type="text" name="tipoausencia" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('show_ausencias') }}'">
                        <i class="fa-solid fa-circle-left"></i> Volver
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
