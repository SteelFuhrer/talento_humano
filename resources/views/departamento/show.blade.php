@extends('home')

@section('content')
<div class="container">
    <div class="card" style="margin: 10px; max-width: 1200px; margin: auto;">
        <h2 class="card-header">Detalle del departamento</h2>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $departamento->nombredpto }}</p>
            <p><strong>Jefe:</strong> {{ $jefe->nombre ?? 'No asignado' }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $departamento->correoelectronicodpto }}</p>
            <p><strong>Teléfono:</strong> {{ $departamento->telefonodpto }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('departamento.index') }}" class="btn btn-secondary"><i class="fa-solid fa-circle-left"></i> Volver</a>
        </div>
    </div>
</div>
<br>
@endsection
