@extends('layout')

@section('content')
<div class="flex justify-center bg-gray-100">
  <div class="w-screen max-w-6xl bg-white rounded-lg shadow-md p-6 md:p-8 relative">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Agregar Post</h2>

    <form class="flex flex-col md:flex-row gap-6" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="flex-grow">
        {{-- Título --}}
        <div class="mb-5">
          <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título del post</label>
          <input type="text" id="title" name="title" value="{{ old('title') }}"
            class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="Título" required>
        </div>

        <div class="mb-5">
          <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenido del post</label>
          <textarea id="content" name="content" rows="5"
            class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="Contenido" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-5 flex flex-col md:flex-row gap-6 w-full md:w-[100%] mx-auto">
          {{-- Categoría --}}
          @if (!$categories || $categories->isEmpty())
            <div class="w-full md:w-1/2 bg-red-50 border border-red-300 p-4 rounded-md flex flex-col gap-2 justify-center">
              <p class="text-red-600 text-sm font-medium text-center">No hay categorías disponibles.</p>
              <a href="{{ route('categories.create') }}"
                class="inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-semibold rounded-md shadow transition duration-150 mx-auto">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                </svg>
                Agregar Categoría
              </a>
            </div>
          @else
            <div class="w-full md:w-1/2 flex flex-col">
              <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
              <select id="category_id" name="category_id"
                class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required>
                <option value="">Selecciona una categoría</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                  </option>
                @endforeach
              </select>
            </div>
          @endif

          <div class="w-full md:w-1/2 flex flex-col">
            <label for="poster" class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
            <input type="file" id="poster" name="poster"
              class="w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md p-2 focus:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150"
              accept="image/*" required>
          </div>
        </div>

        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-full transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300">
          Subir
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
