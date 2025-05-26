<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Sitio Web</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #1f2937;
        }

        nav {
            background-color: #e3d5ca; 
            padding: 16px;
            color: white;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-container a {
            color: white;
            text-decoration: none;
            margin-left: 16px;
        }

        .navbar-container a:hover {
            text-decoration: underline;
        }

        .logo {
            font-weight: bold;
            font-size: 1.25rem;
        }

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="navbar-container">
            <a href="{{ url('/') }}" class="logo">Mi Blog</a>
            <div>
                <a href="{{ url('/') }}">Inicio</a>
                <a href="{{ url('/category') }}">Categorias</a>
                <a href="{{ url('/category/create') }}">Añadir Post</a>
                <a href="{{ url('/login') }}">Iniciar Sesión</a>
              <!-- <a href="{{ url('/logout') }}">Cerrar Sesión</a> -->
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <main>
        @yield('content')
    </main>

</body>
</html>

