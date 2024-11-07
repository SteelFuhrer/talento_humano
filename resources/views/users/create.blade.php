@extends('home')

@section('content')
<div class="container">
    <div class="card" style="margin: 10px; max-width: 1200px; margin: auto;">
        <h2 class="card-header">Registrar nuevo usuario</h2>
        <div class="card-body">
            <form method="POST" action="{{ route('users.store') }}">
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
                    <select name="ci" id="ci" class="custom-select" required>
                        <option value="">Seleccione un empleado</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->ci }}" {{ old('ci') == $empleado->ci ? 'selected' : '' }}>
                                {{ $empleado->ci }} - {{ $empleado->nombre }} {{ $empleado->apellido }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Correo electrónico:</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
        </div>
        <div class="card-footer">  
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                <button type="button" id="regresar" class="btn btn-secondary" onclick="window.location.href='{{ route('users.index') }}'">
                <i class="fa-solid fa-circle-left"></i> Regresar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
