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
    <aside class="group w-16 sm:w-20 md:w-26 md:hover:w-64 transition-all duration-300 bg-white shadow-xl flex flex-col sticky top-0 h-screen">

      <div class="flex items-center justify-center h-16 border-b ">
        <span class="text-lg font-bold hidden md:group-hover:block">Mi Blog</span>
        <span class="text-2xl md:group-hover:hidden">L</span>
      </div>

      <nav class="flex-1 flex flex-col px-2 py-4 space-y-2 overflow-auto">
        <a href="{{ route('home') }}" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M4 12v6a2 2 0 002 2h3v-4h6v4h3a2 2 0 002-2v-6M4 12l8-8 8 8" />
          </svg>
          <span class="hidden md:group-hover:inline">Inicio</span>
        </a>

        <a href="{{ route('posts.index') }}" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
          </svg>
          <span class="hidden md:group-hover:inline">Posts</span>
        </a>

        <a href="{{ route('categories.index') }}" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <span class="hidden md:group-hover:inline">Categorías</span>
        </a>

        <a href="{{ route('categories.create') }}" class="flex items-center gap-4 p-2 rounded-lg hover:bg-gray-200">
          <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <span class="hidden md:group-hover:inline">Añadir Categoría</span>
        </a>


      <!-- Contenedor  -->
       <div class="flex flex-col h-full">
        <a href="{{ route('posts.create') }}" title="Crear un Post" class="flex items-center p-1 rounded-full stroke-blue-600 fill-none md:group-hover:hidden">
           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" stroke-width="1.5" />
            <path d="M8 12H16" stroke-width="1.5" />
            <path d="M12 16V8" stroke-width="1.5" />
          </svg>
        </a>

      <div class="hidden md:group-hover:flex flex-col items-center text-center bg-gray-100 m-1 rounded-2xl shadow-lg p-4 mt-auto">
        <a href="{{ route('posts.create') }}" title="Crear un Post" class="group mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 transition-colors duration-100 outline-none cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 24 24" class="stroke-blue-400 fill-none hover:fill-blue-800 active:stroke-blue-200 active:fill-blue-600 active:duration-0 duration-300">
           <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z" stroke-width="1.5"></path>
           <path d="M8 12H16" stroke-width="1.5"></path>
           <path d="M12 16V8" stroke-width="1.5"></path>
          </svg>
        </a>
      <h2 class="text-base font-semibold text-gray-800">Crear un Post</h2>
      <a href="{{ route('categories.create') }}" class="mt-1 text-sm text-gray-400 hover:text-blue-600">Crear una categoría</a>
  </div>

<a href="{{ route('login') }}" class="mt-1 text-sm text-gray-400 hover:text-blue-600">LOGIN</a>
  
</div>
      </nav>

      <div class="mt-auto px-2 py-4 space-y-2 border-t flex-shrink-0">
        <div class="flex items-center gap-4 mt-6 px-2">
          <div class="w-10 h-10 rounded-full overflow-hidden border-2">
            <img src="https://via.placeholder.com/40" alt="Usuario" class="w-full h-full object-cover" />
          </div>
          <span class="hidden md:group-hover:inline font-semibold">Nombre Usuario</span>
        </div>

        <form method="POST" action="#">
          @csrf
          <button class="flex items-center gap-4 w-full p-2 hover:bg-red-100 rounded-lg text-red-500">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            <span class="hidden md:group-hover:inline">Cerrar sesión</span>
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
