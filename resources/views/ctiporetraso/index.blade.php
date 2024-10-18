<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Retraso</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Tipos de Retraso</h1>
        <a href="{{ route('ctiporetraso.create') }}" class="btn btn-primary mb-3">Agregar Tipo de Retraso</a>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Lista de Tipos de Retraso</h5>
            </div>
            <div class="card-body">
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

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
