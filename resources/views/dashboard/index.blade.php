@extends('home')

@section('content')
<style>
/* Estilos personalizados para las tarjetas */
.card {
    margin-bottom: 20px; /* Espaciado inferior */
    border-radius: 10px; /* Bordes redondeados */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center; /* Centrado horizontal */
    height: 200px; /* Altura consistente */
    display: flex; /* Activar Flexbox */
    flex-direction: column; /* Ordenar elementos en columna */
    align-items: center; /* Centrar horizontalmente */
    justify-content: center; /* Centrar verticalmente */
}

.card:hover {
    transform: scale(1.05); /* Efecto al pasar el mouse */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Sombra elegante */
}

/* Iconos */
.card .fa-3x {
    font-size: 50px; /* Tamaño del ícono */
    margin-bottom: 10px; /* Espaciado con el número */
}

/* Números */
.card-title {
    font-size: 2.5rem; /* Tamaño más grande */
    font-weight: bold; /* Negrita */
    margin-bottom: 5px; /* Separación con el texto */
}

/* Texto descriptivo */
.card-text {
    font-size: 1rem; /* Tamaño más pequeño */
    font-weight: normal; /* Texto normal */
    color: #fff; /* Color blanco */
}

/* Ajustes del contenedor */
.container {
    padding-top: 20px; /* Separación superior */
}
</style>

<div class="container mt-4">
    <div class="row g-3"> <!-- Clase g-3 agrega espacio entre las columnas -->
        <!-- Bloque: Total Empleados -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white bg-primary">
                <i class="fas fa-users fa-3x"></i> <!-- Ícono -->
                <h5 class="card-title">{{ $totalEmpleados }}</h5> <!-- Número -->
                <p class="card-text">Total Empleados</p> <!-- Texto -->
            </div>
        </div>

        <!-- Bloque: Total Departamentos -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white bg-info">
                <i class="fas fa-building fa-3x"></i> <!-- Ícono -->
                <h5 class="card-title">{{ $totalDepartamentos }}</h5> <!-- Número -->
                <p class="card-text">Total Departamentos</p> <!-- Texto -->
            </div>
        </div>

        <!-- Bloque: Ausencias del Día -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white bg-warning">
                <i class="fas fa-calendar-times fa-3x"></i> <!-- Ícono -->
                <h5 class="card-title">{{ $totalEmpleadoausencia }}</h5> <!-- Número -->
                <p class="card-text">Ausencias Hoy</p> <!-- Texto -->
            </div>
        </div>

        <!-- Bloque: Retrasos del Día -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-white bg-danger">
                <i class="fas fa-clock fa-3x"></i> <!-- Ícono -->
                <h5 class="card-title">{{ $totalRetraso }}</h5> <!-- Número -->
                <p class="card-text">Retrasos Hoy</p> <!-- Texto -->
            </div>
        </div>
    </div>
</div>
@endsection
