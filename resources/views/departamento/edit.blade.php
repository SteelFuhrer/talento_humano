@extends('home')

@section('content')
<div class="container">
    <div class="card" style="margin: 10px; max-width: 1200px; margin: auto;">
        <h2 class="card-header">Editar Departamento</h2>
        <div class="card-body">
            <form method="POST" action="{{ route('departamento.update', $departamento->iddpto) }}">
                @csrf
                @method('PUT')
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="nombredpto">Nombre del Departamento:</label>
                    <input type="text" id="nombredpto" name="nombredpto" class="form-control" value="{{ old('nombredpto', $departamento->nombredpto) }}" required>
                </div>
                <div class="form-group">
                    <label for="correoelectronicodpto">Correo Electrónico:</label>
                    <input type="email" id="correoelectronicodpto" name="correoelectronicodpto" class="form-control" value="{{ old('correoelectronicodpto', $departamento->correoelectronicodpto) }}" required>
                </div>
                <div class="form-group">
                    <label for="telefonodpto">Teléfono:</label>
                    <input type="text" id="telefonodpto" name="telefonodpto" class="form-control" value="{{ old('telefonodpto', $departamento->telefonodpto) }}" required>
                </div>
                <div class="form-group">
                    <label for="cijdpto">Jefe del Departamento:</label>
                    <select name="cijdpto" id="cijdpto" class="form-control" required>
                        <option value="">Seleccione un jefe</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->ci }}" {{ old('cijdpto', $departamento->cijdpto) == $empleado->ci ? 'selected' : '' }}>
                                {{ $empleado->nombre }} {{ $empleado->apellido }}
                            </option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-circle-check"></i> Actualizar</button>
            <a href="{{ route('departamento.index') }}" class="btn btn-secondary"><i class="fa-solid fa-circle-left"></i> Regresar</a>
            </form>
        </div>
    </div>
</div>
@endsection
