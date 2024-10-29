@extends('home')

@section('content')
<div class="container">
    <div class="card" style="margin: 10px; max-width: 1200px; margin: auto;">
        <h2 class="card-header">Registrar tipo de retraso</h2>
        <div class="card-body">
        <form action="{{ route('ctiporetraso.store') }}" method="POST">
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
                <label for="tipoderetraso">Tipo de Retraso</label>
                <input type="text" class="form-control" id="tipoderetraso" name="tipoderetraso" required>
            </div>
        </div>
        <div class="card-footer">  
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                <button type="button" id="regresar" class="btn btn-secondary" onclick="window.location.href='{{ route('ctiporetraso.index') }}'">
                    <i class="fa-solid fa-circle-left"></i> Regresar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
