@extends('home')

@section('content')
<div class="container">
    <div class="card" style="margin: 10px; max-width: 1200px; margin: auto;">
        <h2 class="card-header">Detalle de empleado</h2>
        <div class="card-body">
            <p><strong>CI:</strong> {{ $empleado->ci}}</p>
            <p><strong>Nombre completo:</strong> {{ $empleado->nombre.' '.$empleado->apellido.' '.$empleado->apellido2 }}</p>
            <p><strong>Sexo:</strong> 
                {{ $empleado->sexo == 'M' ? 'Masculino' : ($empleado->sexo == 'F' ? 'Femenino' : 'No especificado') }}
            </p>
            <p><strong>Dirección:</strong> {{ $empleado->direccionparticular}}</p>
            <p><strong>Lugar de Nacimiento:</strong> {{ $empleado->lugarnacimiento}}</p>
            <p><strong>Teléfono Móvil:</strong> {{ $empleado->telefonomovil}}</p>
            <p><strong>Correo Electrónico:</strong> {{ $empleado->correoelectronico}}</p>
            <p><strong>Estado Civil:</strong> {{ $empleado->estcivil}}</p>
            <p><strong>Color Cabello:</strong> {{ $empleado->colorpelo}}</p>
            <p><strong>Estatura:</strong> {{ $empleado->estatura}}</p>
            <p><strong>Departamento:</strong> {{ $empleado->nombredpto}}</p>
        </div>
    <div class="card-footer">
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary"><i class="fa-solid fa-circle-left"></i> Volver</a>
    </div>
    </div>
</div>
<br>
@endsection
