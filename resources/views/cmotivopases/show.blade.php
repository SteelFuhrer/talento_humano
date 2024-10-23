@extends('home')

@section('content')
    <h1>Detalle de Pase</h1>
    <p><strong>ID:</strong> {{ $cmotivopase->id_motivopase }}</p>
    <p><strong>Tipo de Pase:</strong> {{ $cmotivopase->motivopase }}</p>
    <a href="{{ route('cmotivopases.index') }}" class="btn btn-secondary">Volver</a>
@endsection
