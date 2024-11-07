@extends('home')

@section('content')
    <h1>Detalle de Trabajo Extra Laboral</h1>
    <p><strong>ID:</strong> {{ $trabextralaboral->idtrabextralaboral }}</p>
    <p><strong>Descripcion Trabajo:</strong> {{ $trabextralaboral->descripciontrab }}</p>
    <p><strong>Hora Inicio:</strong> {{ $trabextralaboral->hini }}</p>
    <p><strong>Hora Fin Trabajo:</strong> {{ $trabextralaboral->hfin }}</p>
    <a href="{{ route('trabextralaboral.index') }}" class="btn btn-secondary">Volver</a>
@endsection
