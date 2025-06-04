<!-- Sidebar lateral -->
<aside class="hidden md:flex group w-16 sm:w-20 md:w-26 md:hover:w-64 transition-all duration-300 bg-white shadow-xl flex-col sticky top-0 h-screen">
  <div class="flex items-center justify-start h-16 border-b">
    <span class="text-lg font-bold hidden md:group-hover:block ml-5">Usuario: {{ Auth::user()->name }}</span>
    <span class="text-2xl md:group-hover:hidden ml-5">
      {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
    </span>
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

    <!-- Crear post expandido -->
    <div class="flex flex-col h-full">
      <a href="{{ route('posts.create') }}" title="Crear un Post" class="flex items-center p-1 rounded-full stroke-blue-600 fill-none md:group-hover:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
          <circle cx="12" cy="12" r="10" stroke-width="1.5" />
          <path d="M8 12H16" stroke-width="1.5" />
          <path d="M12 16V8" stroke-width="1.5" />
        </svg>
      </a>

      <div class="hidden md:group-hover:flex flex-col items-center text-center bg-gray-100 m-1 rounded-2xl shadow-lg p-4 mt-auto">
        <a href="{{ route('posts.create') }}" class="group mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 transition-colors duration-100 outline-none cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 24 24" class="stroke-blue-400 fill-none hover:fill-blue-800 active:stroke-blue-200 active:fill-blue-600 active:duration-0 duration-300">
            <path d="M12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2C6.5 2 2 6.5 2 12C2 17.5 6.5 22 12 22Z" stroke-width="1.5"></path>
            <path d="M8 12H16" stroke-width="1.5"></path>
            <path d="M12 16V8" stroke-width="1.5"></path>
          </svg>
        </a>
        <h2 class="text-base font-semibold text-gray-800">Crear un Post</h2>
        <a href="{{ route('categories.create') }}" class="mt-1 text-sm text-gray-400 hover:text-blue-600">Crear una categoría</a>
      </div>
    </div>
  </nav>

  <div class="mt-auto px-2 py-4 space-y-2 border-t flex-shrink-0">
    <div class="flex items-center gap-3">
      <a href="{{ route('profile.edit') }}" class="flex items-center p-2 rounded-lg hover:bg-blue-200 text-gray-800 font-semibold w-full">
        <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center flex-shrink-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 20v-1a4 4 0 014-4h4a4 4 0 014 4v1" />
          </svg>
        </div>
        <span class="hidden md:group-hover:inline ml-2 truncate">Editar perfil</span>
      </a>
    </div>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button class="flex items-center gap-4 w-full p-2 hover:bg-red-100 rounded-lg text-red-500">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
        </svg>
        <span class="hidden md:group-hover:inline">Cerrar sesión</span>
      </button>
    </form>
  </div>
</aside>

<!-- Menú inferior móvil -->
<div class="fixed bottom-0 left-0 right-0 bg-white border-t shadow-md flex justify-around items-center h-14 md:hidden z-40">

  <a href="{{ route('home') }}" class="flex flex-col items-center text-xs text-gray-700 hover:text-blue-600">
    <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12v6a2 2 0 002 2h3v-4h6v4h3a2 2 0 002-2v-6M4 12l8-8 8 8" />
    </svg>
    Inicio
  </a>

  <a href="{{ route('posts.index') }}" class="flex flex-col items-center text-xs text-gray-700 hover:text-blue-600">
    <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" />
    </svg>
    Posts
  </a>

  <!-- Botón Crear con menú desplegable usando Alpine.js -->
  <div x-data="{ open: false }" class="relative">
    <button 
      @click="open = !open"
      class="flex flex-col items-center text-xs text-gray-700 hover:text-blue-600 focus:outline-none"
      aria-expanded="false"
      aria-controls="crearMenu"
    >
      <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <circle cx="12" cy="12" r="10" stroke-width="1.5" />
        <path d="M8 12H16" stroke-width="1.5" />
        <path d="M12 16V8" stroke-width="1.5" />
      </svg>
      Crear
    </button>

    <div 
      x-show="open" 
      @click.outside="open = false"
      x-transition
      id="crearMenu"
      class="absolute bottom-14 left-1/2 transform -translate-x-1/2 bg-white border rounded-lg shadow-lg w-40 text-center py-2"
      style="display: none;"
    >
      <a href="{{ route('posts.create') }}" class="block px-4 py-2 hover:bg-blue-100 text-gray-700">Crear Post</a>
      <a href="{{ route('categories.create') }}" class="block px-4 py-2 hover:bg-blue-100 text-gray-700">Crear Categoría</a>
    </div>
  </div>

  <a href="{{ route('categories.index') }}" class="flex flex-col items-center text-xs text-gray-700 hover:text-blue-600">
    <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
    </svg>
    Categorías
  </a>

  <a href="{{ route('profile.edit') }}" class="flex flex-col items-center text-xs text-gray-700 hover:text-blue-600">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z" />
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 20v-1a4 4 0 014-4h4a4 4 0 014 4v1" />
    </svg>
    Perfil
  </a>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="flex flex-col items-center text-xs text-red-500 hover:text-red-700 px-1">
      <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
      </svg>
      Salir
    </button>
  </form>
</div>
