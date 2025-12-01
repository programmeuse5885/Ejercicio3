<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administrador Escolar')</title>

    <!-- Bootstrap: Framework CSS para estilos rápidos -->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet">

    <style>
        /* Estilos personalizados para la barra de navegación */
        .navbar {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
            letter-spacing: 1px;
        }

        .nav-link {
            font-weight: 500;
            color: #ffffffc7 !important;
            transition: 0.3s;
        }

        /* Efecto hover en los enlaces del menú */
        .nav-link:hover {
            color: #fff !important;
            transform: scale(1.05);
        }

        /* Clase para resaltar el enlace activo */
        .active-link {
            color: #fff !important;
            border-bottom: 2px solid #fff;
        }

        footer {
            color: #777;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container">

            <!-- Título o logo de la aplicación -->
            <a class="navbar-brand" href="{{ url('/') }}">
                📘 Administrador Escolar
            </a>

            <!-- Botón para menú móvil -->
            <button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menú de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">
                    
                    <!-- Enlace: Inicio -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active-link' : '' }}" 
                           href="{{ url('/') }}">
                           Inicio
                        </a>
                    </li>

                    <!-- Enlace: Escuelas -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('schools*') ? 'active-link' : '' }}"
                           href="{{ route('schools.index') }}">
                           Escuelas
                        </a>
                    </li>

                    <!-- Enlace: Estudiantes -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('students*') ? 'active-link' : '' }}"
                           href="{{ route('students.index') }}">
                           Estudiantes
                        </a>
                    </li>

                    <!-- Enlace: Maestros -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('teachers*') ? 'active-link' : '' }}"
                           href="{{ route('teachers.index') }}">
                           Maestros
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal (cada vista se carga aquí) -->
    <div class="container mt-4 mb-5">
        @yield('content')
    </div>

    <!-- Pie de página -->
    <footer class="text-center py-3">
        <small>© {{ date('Y') }} Administrador Escolar • Todos los derechos reservados.</small>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>
</body>
</html>
