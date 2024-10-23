<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tipo de Retraso</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Crear Tipo de Retraso</h1>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('ctiporetraso.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="numero">Número</label>
                <input type="number" class="form-control" id="numero" name="numero" value="{{ $numero }}" readonly>
            </div>
            <div class="form-group">
                <label for="tipoderetraso">Tipo de Retraso</label>
                <input type="text" class="form-control" id="tipoderetraso" name="tipoderetraso" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{ route('ctiporetraso.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
