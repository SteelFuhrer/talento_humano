@extends('home')

@section('content')
<div class="container">
    <div class="card" style="margin: 10px; max-width: 1200px; margin: auto;">
        <h2 class="card-header">Editar empleados</h2>
        <div class="card-body">
            <form method="POST" action="{{ route('empleados.update', $empleado->ci) }}">
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
                    <label for="title">Nombres:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $empleado->nombre) }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" class="form-control" value="{{ old('apellido', $empleado->apellido) }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Segundo Apellido:</label>
                    <input type="text" id="apellido2" name="apellido2" class="form-control" value="{{ old('apellido2', $empleado->apellido2) }}">
                </div>
                <div class="form-group">
                    <label for="content">Genero:</label>
                    <select name="sexo" id="sexo" class="custom-select" aria-label="Default select example" required>
                        <option value="" disabled {{ old('sexo') ? '' : 'selected' }}>Seleccione una opción</option>
                        <option value="M" {{ old('sexo', $empleado->sexo) == "M" ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ old('sexo', $empleado->sexo) == "F" ? 'selected' : '' }}>Femenino</option>
	                </select>
                </div>
                <div class="form-group">
                    <label for="content">Dirección:</label>
                    <input type="text" id="direccionparticular" name="direccionparticular" class="form-control" value="{{ old('direccionparticular', $empleado->direccionparticular)}}" required>
                </div>
                <div class="form-group">
                    <label for="content">Lugar de Nacimiento:</label>
                    <input type="text" id="lugarnacimiento" name="lugarnacimiento" class="form-control" value="{{ old('lugarnacimiento', $empleado->lugarnacimiento)}}" required>
                </div>
                <div class="form-group">
                    <label for="content">Teléfono Móvil:</label>
                    <input type="text" id="telefonomovil" name="telefonomovil" class="form-control" value="{{ old('telefonomovil', $empleado->telefonomovil)}}" required>
                </div>
                <div class="form-group">
                    <label for="content">Correo Electrónico:</label>
                    <input type="text" id="correoelectronico" name="correoelectronico" class="form-control" value="{{ old('correoelectronico', $empleado->correoelectronico) }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Estado Civil:</label>
                    <select name="estcivil" id="estcivil" class="custom-select" required>
                        <option value="" disabled {{ old('estcivil') ? '' : 'selected' }}>Seleccione una opción</option>
                        <option value="Soltero" {{ old('estcivil', $empleado->estcivil) == "Soltero" ? 'selected' : '' }}>Soltero</option>
                        <option value="Casado" {{ old('estcivil', $empleado->estcivil) == "Casado" ? 'selected' : '' }}>Casado</option>
                        <option value="Viudo" {{ old('estcivil', $empleado->estcivil) == "Viudo" ? 'selected' : '' }}>Viudo</option>
                        <option value="Divorciado" {{ old('estcivil', $empleado->estcivil) == "Divorciado" ? 'selected' : '' }}>Divorciado</option>
	                </select>
                </div>
                <div class="form-group">
                    <label for="content">Color de Cabello:</label>
                    <input type="text" id="colorpelo" name="colorpelo" class="form-control" value="{{ old('colorpelo', $empleado->colorpelo) }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Estatura:</label>
                    <input type="text" id="estatura" name="estatura" class="form-control" value="{{ old('estatura', $empleado->estatura) }}" required>
                </div>
                <div class="form-group">
                    <label for="content">Departamento:</label>
                    <input type="text" id="iddpto" name="iddpto" class="form-control" value="{{ old('iddpto', $empleado->iddpto) }}">
                </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-check"></i> Actualizar</button>
            </form>
            <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('empleados.index') }}'">
                <i class="fa-solid fa-circle-left"></i> Regresar
        </div>
    </div>
</div>
@endsection  