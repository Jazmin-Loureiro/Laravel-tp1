@extends('layout')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 p-4"> {{-- Padding para que no quede pegado --}}
  <div class="w-full max-w-6xl bg-white rounded-lg shadow-md p-6 md:p-8 relative">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Editar Post</h2>
    <form class="flex flex-col md:flex-row gap-6" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('POST')

      <div class="mb-6 flex justify-center md:justify-end items-center gap-2 md:absolute md:top-8 md:right-8 z-10">
        <label class="switch cursor-pointer relative flex w-[6.7rem] scale-75 overflow-hidden p-2">
          <input type="hidden" name="habilitated" value="0">
          <input type="checkbox" name="habilitated" value="1" class="peer hidden" id="toggle_switch" {{ $post->habilitated ? 'checked' : '' }} />
          <div class="absolute -right-[6.5rem] z-[1] flex h-12 w-24 skew-x-12 items-center justify-center text-lg duration-500 peer-checked:right-1">
            <span class="-skew-x-12">ACTIVO</span>
          </div>
          <div class="z-0 h-12 w-24 -skew-x-12 border border-black duration-500 peer-checked:skew-x-12 peer-checked:bg-green-500"></div>
           <div class="absolute left-[0.3rem] flex h-12 w-24 -skew-x-12 items-center justify-center text-lg duration-500 peer-checked:-left-[6.5rem]">
            <span class="skew-x-12">INACTIVO</span>
          </div>
        </label>
      </div>

      <div class="flex-shrink-0 w-full md:w-1/3 relative rounded-3xl shadow-2xl">
        <label for="poster" class="cursor-pointer group block w-full h-48 md:h-full relative rounded-3xl overflow-hidden">
          <img id="preview" src="{{ asset('storage/' . $post->poster) }}" alt="poster" class="rounded-lg shadow-md w-full h-full object-cover group-hover:opacity-75 transition" />
          <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 opacity-0 group-hover:opacity-100 transition rounded-lg">  
            <span class="text-white font-semibold">Cambiar Imagen</span>
          </div>
        </label>
        <input type="file" id="poster" name="poster" class="hidden" accept="image/*" onchange="previewImage(event)">
      </div>

      <div class="flex-grow">
        <div class="mb-5">
          <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título del post</label>
          <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"placeholder="Título" required></div>
        <div class="mb-5">
          <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenido del post</label>
          <textarea id="content" name="content" rows="5" class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Contenido" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-5">
          <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
          <select id="category_id" name="category_id" class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"required>
            <option value="">Selecciona una categoría</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>

        <button type="submit"class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-md transition duration-150">
          Guardar Cambios
        </button>
      </div>
    </form>
  </div>
</div>

<!-- previsualización -->
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
