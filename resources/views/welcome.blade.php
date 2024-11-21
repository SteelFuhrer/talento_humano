<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asociación Aliados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #003366;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: bold;
            text-transform: uppercase;
        }
        .hero {
            background: url('{{ asset('images/1.png') }}') no-repeat center center;
            background-size: cover;
            height: 100vh; /* Full screen height */
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero h1 {
            color: white;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8);
            font-size: 3rem;
            animation: fadeInDown 2s ease-in-out;
        }
        .section-title {
            color: #003366;
            font-weight: bold;
            margin-bottom: 1rem;
            text-transform: uppercase;
            text-align: center;
        }
        .content-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .footer {
            background-color: #003366;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .btn-primary {
            background-color: #003366;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Media Queries for responsiveness */
        @media (max-width: 768px) {
            .hero {
                height: 70vh; /* Smaller height for mobile */
            }
            .hero h1 {
                font-size: 2.5rem; /* Smaller font size */
            }
            .content-section {
                padding: 15px;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2rem; /* Even smaller font size */
            }
            .content-section {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="70" height="50">
                Asociación Aliados
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Registro</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1></h1>
    </div>

    <!-- About Section -->
    <section id="about" class="container my-5">
        <h2 class="section-title">¿Quiénes Somos?</h2>
        <div class="content-section">
            <p>
                Somos una organización sin fines de lucro comprometida con el desarrollo integral de nuestras comunidades. Trabajamos para conectar recursos con necesidades reales, impulsando proyectos que generen un impacto positivo y sostenible.
            </p>
            <p>
                Nuestra labor está enfocada en crear alianzas estratégicas con instituciones públicas y privadas, garantizando transparencia y compromiso en cada iniciativa.
            </p>
        </div>
    </section>

    <!-- Mission Section -->
    <section id="mission" class="container my-5">
        <h2 class="section-title">Nuestra Misión</h2>
        <div class="content-section">
            <p>
                Inspirar y empoderar a las comunidades para alcanzar su máximo potencial mediante la educación, la inclusión y el desarrollo sostenible. 
            </p>
            <p>
                Nos esforzamos por crear oportunidades que transformen vidas y promuevan la igualdad, asegurando un impacto duradero en las generaciones futuras.
            </p>
        </div>
    </section>

    <!-- Vision Section -->
    <section id="vision" class="container my-5">
        <h2 class="section-title">Nuestra Visión</h2>
        <div class="content-section">
            <p>
                Convertirnos en un referente global en la construcción de comunidades resilientes, inclusivas y prósperas. 
            </p>
            <p>
                Aspiramos a liderar con innovación y compromiso, guiados por principios éticos sólidos y una pasión por el cambio social positivo.
            </p>
        </div>
    </section>

    <!-- Values Section -->
    <section id="values" class="container my-5">
        <h2 class="section-title">Nuestros Valores</h2>
        <div class="content-section">
            <ul>
                <li><b>Integridad:</b> Actuamos con honestidad y transparencia en todo lo que hacemos.</li>
                <li><b>Compromiso:</b> Dedicación plena hacia nuestras comunidades y proyectos.</li>
                <li><b>Innovación:</b> Buscamos soluciones creativas para enfrentar desafíos.</li>
                <li><b>Respeto:</b> Valoramos la diversidad y fomentamos la inclusión.</li>
                <li><b>Trabajo en equipo:</b> Creemos en la fuerza de la colaboración para lograr grandes objetivos.</li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2024 Asociación Aliados. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
