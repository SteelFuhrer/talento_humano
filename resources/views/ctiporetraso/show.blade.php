<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Tipo de Retraso</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalles del Tipo de Retraso</h1>

        <div class="card">
            <div class="card-header">
                Información del Tipo de Retraso
            </div>
            <div class="card-body">
                <p><strong>ID Tipo de Retraso:</strong> {{ $ctiporetraso->idtiporetraso }}</p>
                <p><strong>Descripción:</strong> {{ $ctiporetraso->descripcion }}</p> <!-- Cambia 'descripcion' según tu tabla -->
            </div>
        </div>

        <a href="{{ route('ctiporetraso.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
