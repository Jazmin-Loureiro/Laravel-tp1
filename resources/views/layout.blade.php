<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mi Blog</title>
  <script src="https://cdn.tailwindcss.com"></script> 
</head>

<body class="bg-gray-100">
  <div class="flex min-h-screen">
    <!-- SIDEBAR sticky -->
    <aside class="group w-26 hover:w-64 transition-all duration-400 bg-white shadow-xl flex flex-col sticky top-0 h-screen">

      <!-- LOGO -->
      <div class="flex items-center justify-center h-16 border-b ">
        <span class="text-lg font-bold hidden group-hover:block">Mi Blog</span>
        <span class="text-2xl group-hover:hidden">L</span>
      </div>

      <nav class="flex-1 flex flex-col px-2 py-4 space-y-2 overflow-auto">
        <a href="{{ route('home') }}" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M4 12v6a2 2 0 002 2h3v-4h6v4h3a2 2 0 002-2v-6M4 12l8-8 8 8" />
          </svg>
          <span class="hidden group-hover:inline">Inicio</span>
        </a>

        <a href="{{ route('posts.index') }}" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
          </svg>
          <span class="hidden group-hover:inline">Posts</span>
        </a>

        <a href="{{ route('posts.create') }}" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M12 4v16m8-8H4" />
          </svg>
          <span class="hidden group-hover:inline">Añadir Post</span>
        </a>

        <a href="{{ route('category.index') }}" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <span class="hidden group-hover:inline">Categorías</span>
        </a>

        <a href="{{ route('category.create') }}" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <span class="hidden group-hover:inline">Añadir Categoría</span>
        </a>
      </nav>

      <div class="mt-auto px-2 py-4 space-y-2 border-t flex-shrink-0">
        <div class="flex items-center gap-4 mt-6 px-2">
          <div class="w-10 h-10 rounded-full overflow-hidden border-2">
            <img src="https://via.placeholder.com/40" alt="Usuario" class="w-full h-full object-cover" />
          </div>
          <span class="hidden group-hover:inline font-semibold">Nombre Usuario</span>
        </div>

        <form method="POST" action="#">
          @csrf
          <button class="flex items-center gap-4 w-full p-2 hover:bg-red-100 rounded-lg text-red-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            <span class="hidden group-hover:inline">Cerrar sesión</span>
          </button>
        </form>
      </div>
    </aside>

    <main class="flex-1 p-4 overflow-auto">
      @yield('content')
    </main>
  </div>
</body>
</html>
