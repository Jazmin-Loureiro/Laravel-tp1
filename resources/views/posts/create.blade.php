@extends('layout')

@section('content')
<div class="flex flex-col items-center justify-center">
  <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-gray-900 mb-4 text-center">Agregar Post</h2>

    <form class="flex flex-col" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
     <input type="text" id="title" name="title" value="{{ old('title') }}" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4" placeholder="Título" required>
     
     <textarea id="content" name="content" class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-4" placeholder="Contenido" required>{{ old('content') }}</textarea>

      <input type="file" id="poster" name="poster"  class="bg-gray-100 text-gray-900 border-0 rounded-md p-2 mb-2" required accept="image/*">
      @error('poster')
        <p class="text-sm text-red-500 mb-3">{{ $message }}</p>
      @enderror
      <!-- Imagen previa -->
      <img id="preview" class="w-full h-auto rounded-md mt-2 hidden" />

      <button type="submit" class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold py-2 px-4 rounded-md mt-4 hover:bg-indigo-600 hover:to-blue-600 transition ease-in-out duration-150">
        Subir
      </button>
    </form>
  </div>
</div>


@endsection

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