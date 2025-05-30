@extends('layout')

@section('content')

@php
  $colores = [
    'red' => 'Rojo', 'orange' => 'Naranja', 'yellow' => 'Amarillo',
    'green' => 'Verde', 'blue' => 'Azul', 'purple' => 'Violeta',
    'pink' => 'Rosa', 'black' => 'Negro', 'brown' => 'Marrón',
  ];

  $colorSeleccionado = old('color', $category->color);
  if (strtolower($colorSeleccionado) === 'white' || strtolower($colorSeleccionado) === '#ffffff') {
    $colorSeleccionado = null;
  }
  $esPersonalizado = Str::startsWith($colorSeleccionado, '#');
@endphp

<div class="flex justify-center bg-gray-100">
  <div class="w-full max-w-5xl bg-white rounded-lg shadow-md p-4 sm:p-6 md:p-8 relative">
    <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 text-center">Editar Categoría</h2>

    @if(session('success'))
      <div class="alert alert-success text-green-600 text-center font-semibold mb-4">{{ session('success') }}</div>
    @endif

    @if(session('error'))
      <div class="alert alert-error text-red-600 text-center font-semibold mb-4">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-4 rounded mb-4 font-semibold text-center">
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif

    <form class="flex flex-col gap-6" action="{{ route('categories.update', $category->id) }}" method="POST">
      @csrf 
      @method('POST')

      {{-- Switch --}}
      <div class="flex justify-center md:justify-end items-center gap-2 md:absolute md:top-6 md:right-6 z-10">
        <label class="switch cursor-pointer relative flex w-[6.7rem] scale-75 overflow-hidden p-2">
          <input type="hidden" name="habilitated" value="0">
          <input type="checkbox" name="habilitated" value="1" class="peer hidden" id="toggle_switch" {{ $category->habilitated ? 'checked' : '' }} />
          <div class="absolute -right-[6.5rem] z-[1] flex h-12 w-24 skew-x-12 items-center justify-center text-sm sm:text-base duration-500 peer-checked:right-1">
            <span class="-skew-x-12">ACTIVO</span>
          </div>
          <div class="z-0 h-12 w-24 -skew-x-12 border border-black duration-500 peer-checked:skew-x-12 peer-checked:bg-green-500"></div>
          <div class="absolute left-[0.3rem] flex h-12 w-24 -skew-x-12 items-center justify-center text-sm sm:text-base duration-500 peer-checked:-left-[6.5rem]">
            <span class="skew-x-12">INACTIVO</span>
          </div>
        </label>
      </div>

      {{-- Campos en fila horizontal --}}
      <div class="w-full flex flex-col md:flex-row gap-6">
        {{-- Columna izquierda --}}
        <div class="w-full md:w-1/2">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}"
              class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
              required>
          </div>

          <div class="mb-1">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
              Descripción 
              <span class="text-gray-500 text-xs">(máx. 255 caracteres)</span>
            </label>
            <textarea id="description" name="description" maxlength="255" oninput="actualizarContador()"
              class="w-full p-8 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
              required>{{ old('description', $category->description) }}</textarea>
            <small id="contador-caracteres" class="text-gray-500 text-xs">
              {{ 255 - strlen(old('description', $category->description)) }} caracteres restantes
            </small>
          </div>
        </div>

        {{-- Columna derecha: selección de colores --}}
        <div class="w-full md:w-1/2">
          <label class="block text-sm font-medium text-gray-700 mb-2">Color</label>
          <div class="flex flex-wrap gap-3 justify-start">
            @foreach ($colores as $code => $label)
              <label class="flex flex-col items-center cursor-pointer">
                <input type="radio" class="sr-only peer" name="color" value="{{ $code }}" {{ $colorSeleccionado === $code ? 'checked' : '' }}>
                <div class="w-[70px] h-[70px] rounded-xl border-2 peer-checked:border-black peer-checked:shadow-md border-gray-300" style="background-color: {{ $code }};"></div>
                <span class="text-xs mt-1">{{ $label }}</span>
              </label>
            @endforeach

            {{-- Color personalizado --}}
            <label class="flex flex-col items-center cursor-pointer">
              <input type="radio" class="sr-only peer" name="color"
                value="{{ $esPersonalizado ? $colorSeleccionado : '' }}"
                {{ $esPersonalizado ? 'checked' : '' }}
                id="color-personalizado-radio">
              <div class="w-[70px] h-[70px] rounded-xl overflow-hidden border-2 peer-checked:border-black peer-checked:shadow-md border-gray-300">
                <input type="color" id="color-personalizado-input" name="color"
                      value="{{ $esPersonalizado ? $colorSeleccionado : '' }}"
                      class="w-full h-full border-none cursor-pointer"
                      oninput="document.getElementById('color-personalizado-radio').value = this.value"
                      onclick="document.getElementById('color-personalizado-radio').checked = true">
              </div>
              <span class="text-xs mt-1">Otro</span>
            </label>
          </div>
        </div>
      </div>

      {{-- Botón de envío ABAJO --}}
      <div class="mt-8 flex flex-col gap-4">
        <button type="submit"
          class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-full transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300">
          Guardar Cambios
        </button>

        <a href="{{ route('categories.index') }}"
          class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-full transition duration-150">
          Volver a Categorías
        </a>
      </div>
    </form>
  </div>
</div>

<script>
  function actualizarContador() {
    const textarea = document.getElementById('description');
    const contador = document.getElementById('contador-caracteres');
    const restante = 255 - textarea.value.length;
    contador.textContent = `${restante} caracteres restantes`;
  }

  document.addEventListener('DOMContentLoaded', actualizarContador);
</script>

@endsection
