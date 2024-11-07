@extends('home')

@section('content')
<div class="container">
    <div class="card" style="margin: 10px; max-width: 1200px; margin: auto;">
        <h2 class="card-header">Editar usuario</h2>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
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
                        <option value="" disabled {{ old('sexo') ? '' : 'selected' }}>Seleccione un empleado</option>
                        @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->ci }}" {{ old('ci', $user->ci) == $empleado->ci ? 'selected' : '' }}>
                                {{ $empleado->ci }} - {{ $empleado->nombre }} {{ $empleado->apellido }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Correo electrónico:</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $user->email)}}" required>
                </div>
                <div class="form-group">
                    <label for="content">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-check"></i> Actualizar</button>
            </form>
            <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('users.index') }}'">
                <i class="fa-solid fa-circle-left"></i> Regresar
        </div>
    </div>
</div>
@endsection  