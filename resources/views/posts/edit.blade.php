@extends('layout')

@section('content')
<div class="flex justify-center  bg-gray-100">
  <div class="w-full max-w-5xl bg-white rounded-lg shadow-md p-4 sm:p-6 md:p-8 relative">
    <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 text-center">Editar Post</h2>

    <form class="flex flex-col md:flex-row" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('POST')

      <div class=" flex justify-center md:justify-end items-center gap-2 md:absolute md:top-6 md:right-6 z-10">
        <label class="switch cursor-pointer relative flex w-[6.7rem] scale-75 overflow-hidden p-2">
          <input type="hidden" name="habilitated" value="0">
          <input type="checkbox" name="habilitated" value="1" class="peer hidden" id="toggle_switch" {{ $post->habilitated ? 'checked' : '' }} />
          <div class="absolute -right-[6.5rem] z-[1] flex h-12 w-24 skew-x-12 items-center justify-center text-sm sm:text-base duration-500 peer-checked:right-1">
            <span class="-skew-x-12">ACTIVO</span>
          </div>
          <div class="z-0 h-12 w-24 -skew-x-12 border border-black duration-500 peer-checked:skew-x-12 peer-checked:bg-green-500"></div>
          <div class="absolute left-[0.3rem] flex h-12 w-24 -skew-x-12 items-center justify-center text-sm sm:text-base duration-500 peer-checked:-left-[6.5rem]">
            <span class="skew-x-12">INACTIVO</span>
          </div>
        </label>
      </div>

    <div class="w-full md:w-1/3 relative rounded-3xl shadow-2xl flex-shrink-0 max-h-[400px]">
        <label for="poster" class="cursor-pointer group block w-full h-48 sm:h-64 md:h-full relative rounded-3xl overflow-hidden">
        <img id="preview" src="{{ asset('storage/' . $post->poster) }}" alt="poster" class="rounded-lg shadow-md w-full h-full object-cover group-hover:opacity-75 transition" />
        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 transition rounded-lg">  
          <span class="text-white font-semibold">Cambiar Imagen</span>
        </div>
        </label>
        <input type="file" id="poster" name="poster" class="hidden" accept="image/*" onchange="previewImage(event)">
    </div>

      <div class="w-full md:flex-1 flex flex-col">
        <div class="mb-4">
          <label for="title" class="block text-sm font-medium text-gray-700 mb-1 mt-5">Título del post</label>
          <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Título" required>
        </div>

        <div class="mb-4">
          <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenido del post</label>
          <textarea id="content" name="content" rows="5" class=" resize-y w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 break-words" placeholder="Contenido" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-6">
          <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
          <select id="category_id" name="category_id" class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            <option value="">Selecciona una categoría</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="w-full sm:w-80 mx-auto block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-full transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300">
          Guardar Cambios
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function () {
      const preview = document.getElementById('preview');
      preview.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  }
</script>
@endsection
