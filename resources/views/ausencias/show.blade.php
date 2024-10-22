@extends('home')

@section('content')
    <h1>Detalle de Ausencia</h1>
    <p><strong>ID:</strong> {{ $ausencia->id_ausencia }}</p>
    <p><strong>Tipo de Ausencia:</strong> {{ $ausencia->tipoausencia }}</p>
    <a href="{{ route('ausencias.index') }}" class="btn btn-secondary">Volver</a>
@endsection
