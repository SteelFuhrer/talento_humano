@extends('home')

@section('content')
<div class="container">
    <h2>Registrar horas extras</h2>
    <div class="card card-outline card-success" style="margin: 10px; max-width: 1200px; margin: auto;">
        <div class="card-header">
            <p><strong> Ingrese los datos </strong></p>
        </div>
        <div class="card-body">
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
        </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                <button type="button" id="volver" class="btn btn-secondary" onclick="window.location.href='{{ route('trabextralaboral.index') }}'">
                    <i class="fa-solid fa-circle-left"></i> Volver
                </button>
            </form>
            </div>
    </div>
</div>
@endsection
