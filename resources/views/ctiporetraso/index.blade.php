@extends('home')
@section('content')
<div class="container">
    <div class="row" style="margin:20px">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>Gestión de tipos de retraso</h2>
            </div>
        <div class="card-body">
        <a href="{{ route('ctiporetraso.create') }}" class="btn btn-success btn-sm" title="Nuevo"><i class="fa-solid fa-circle-plus"></i> Nuevo</a>
        <br><br>
        <div class="table-responsive">    
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th> <!-- Cambiado a enumerar en lugar de ID -->
                            <th>Tipo de Retraso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tiposDeRetraso as $index => $tipo)
                            <tr>
                                <td>{{ $index + 1 }}</td> <!-- Enumeración comenzando desde 1 -->
                                <td>{{ $tipo->tipoderetraso }}</td>
                                <td>
                                    <a href="{{ route('ctiporetraso.edit', $tipo->idtiporetraso) }}" class="btn btn-warning">Editar</a> <!-- Usando el ID para editar -->
                                    <form action="{{ route('ctiporetraso.destroy', $tipo->idtiporetraso) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection