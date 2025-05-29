@extends('layout')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 p-4">
  <div class="w-full max-w-6xl bg-white rounded-lg shadow-md p-6 md:p-8 relative">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Agregar Post</h2>

    <form class="flex flex-col md:flex-row gap-6" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="flex-shrink-0 w-full md:w-1/3 relative rounded-3xl shadow-2xl">
        <label for="poster" class="cursor-pointer group block w-full h-48 md:h-full relative rounded-3xl overflow-hidden">
          <img id="preview" class="rounded-lg shadow-md w-full h-full object-cover group-hover:opacity-75 transition hidden" />
          <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 transition rounded-lg">
            <span class="text-white font-semibold">Subir Imagen</span>
          </div>
        </label>
        <input type="file" id="poster" name="poster" class="hidden" accept="image/*" required>
      </div>

      <div class="flex-grow">
        <div class="mb-5">
          <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título del post</label>
          <input type="text" id="title" name="title" value="{{ old('title') }}"
                 class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                 placeholder="Título" required>
        </div>

        <div class="mb-5">
          <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenido del post</label>
          <textarea id="content" name="content" rows="5" class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Contenido" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-5">
          <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
          <select id="category_id" name="category_id" class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"required>
            <option value="">Selecciona una categoría</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-md transition duration-150">
          Subir
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Script para vista previa -->
<script>
  const posterInput = document.getElementById('poster');
  const previewImg = document.getElementById('preview');

  posterInput.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        previewImg.src = e.target.result;
        previewImg.classList.remove('hidden');
      };
      reader.readAsDataURL(file);
    } else {
      previewImg.src = '';
      previewImg.classList.add('hidden');
    }
  });
</script>
@endsection
