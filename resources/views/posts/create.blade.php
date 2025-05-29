@extends('layout')

@section('content')
<div class="flex  justify-center bg-gray-100">
  <div class="w-screen max-w-6xl bg-white rounded-lg shadow-md p-6 md:p-8 relative">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Agregar Post</h2>

    <form class="flex flex-col md:flex-row gap-6" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="flex-grow">
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

        <div class="mb-5 flex flex-col md:flex-row gap-6">
          <div class="w-full md:w-1/2 flex flex-col">
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
              <select id="category_id" name="category_id" class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                <option value="">Selecciona una categoría</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
                </option>
                @endforeach
              </select>
          </div>

         <div class="w-full md:w-1/2 flex flex-col">
            <div class="mb-4">
            <label for="poster" class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
            <input type="file" id="poster" name="poster" class="w-full bg-gray-100 text-gray-900 border border-gray-300 rounded-md p-2 focus:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transition ease-in-out duration-150" accept="image/*" required>
            </div>  
          </div>
        </div>
       
        <button type="submit"
          class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-md transition duration-150">
          Subir
        </button>
      </div>
    </form>
  </div>
</div>

@endsection
