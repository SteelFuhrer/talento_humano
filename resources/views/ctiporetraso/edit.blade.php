<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Retraso</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Tipo de Retraso</h1>
        <a href="{{ route('ctiporetraso.index') }}" class="btn btn-secondary mb-3">Volver a la Lista</a>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Editar Tipo de Retraso</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('ctiporetraso.update', $tipo->idtiporetraso) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Campo para el número del registro (en lugar del ID) -->
                    <div class="form-group">
                        <label for="numero">Número de Registro</label>
                        <input type="text" class="form-control" id="numero" value="{{ $numero }}" disabled> <!-- Mostrando el número en lugar del ID -->
                    </div>

                    <div class="form-group">
                        <label for="tipoderetraso">Tipo de Retraso</label>
                        <input type="text" name="tipoderetraso" class="form-control" id="tipoderetraso" value="{{ $tipo->tipoderetraso }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
