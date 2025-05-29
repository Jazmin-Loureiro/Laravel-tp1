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

<style>
  .form {
    max-width: 500px;
    margin: 50px auto;
    margin-top: 10px;
    padding: 30px 25px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    transition: box-shadow 0.3s ease;
  }

  .form-row {
    display: flex;
    flex-direction: column;
    margin-bottom: 20px;
  }

  .form-row label {
    font-weight: 600;
    margin-bottom: 8px;
    color: #444;
    user-select: none;
  }

  .form-row input[type="text"],
  .form-row select,
  .form-row textarea {
    padding: 12px 15px;
    font-size: 1rem;
    border: 1.8px solid #ddd;
    border-radius: 8px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    font-family: inherit;
    resize: vertical;
  }

  .form-row input[type="text"]:focus,
  .form-row select:focus,
  .form-row textarea:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
  }

  .form-row textarea {
    min-height: 130px;
  }

  .submit {
    width: 100%;
    padding: 14px 0;
    background: #007bff;
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 1.15rem;
    font-weight: 700;
    cursor: pointer;
    user-select: none;
    transition: background-color 0.25s ease;
  }

  .volver {
    margin-top: 10px;
    width: 100%;
    padding: 14px 0;
    background: blue;
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 1.15rem;
    font-weight: 700;
    cursor: pointer;
    user-select: none;
    transition: background-color 0.25s ease;
  }

  .submit:hover {
    background-color: #0056b3;
  }

  .volver:hover {
    background-color: darkblue;
  }

  h1 {
    text-align: center;
    margin-bottom: 35px;
    font-weight: 700;
    color: #222;
    user-select: none;
  }

  .alert {
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
  }

  .alert-success {
    color: green;
  }

  .alert-error {
    color: red;
  }

  .color-radio {
    display: none;
  }

  .color-box {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    border: 2px solid #ccc;
  }

  .color-radio:checked + .color-box {
    border: 3px solid #000;
  }

  .form-header {
  max-width: 500px;
  margin: 50px auto 10px auto; /* igual que .form */
  text-align: center;
}

.form-header h1 {
  font-size: 2.2rem;
  font-weight: 800;
  color: #1e293b;
  margin-bottom: 0;
}

</style>

<div class="form-header">
  <h1>Editar Categoría</h1>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
  <div class="alert alert-error">{{ session('error') }}</div>
@endif

{{-- Mostrar errores de validación --}}
@if ($errors->any())
  <div style="margin-bottom: 20px; background: #ffe6e6; color: #b30000; padding: 12px 18px; border-radius: 8px; font-weight: bold; text-align: center;">
    @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
    @endforeach
  </div>
@endif

<form class="form" action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf 
    @method('POST')

    <div class="form-row">
      <label for="name">Nombre</label>
      <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
    </div>

    <div class="form-row">
      <label for="description">Descripción</label>
      <textarea id="description" name="description" required>{{ old('description', $category->description) }}</textarea>
    </div>

    <div class="form-row">
      <label for="habilitated">Estado</label>
      <select id="habilitated" name="habilitated" required>
          <option value="1" {{ $category->habilitated ? 'selected' : '' }}>Activo</option>
          <option value="0" {{ !$category->habilitated ? 'selected' : '' }}>Desactivado</option>
      </select>
    </div>

    <div class="form-row">
      <label>Color</label>
      <div style="display: flex; flex-wrap: wrap; gap: 10px;">
        @foreach ($colores as $code => $label)
          <label style="cursor: pointer; text-align: center;">
            <input
              type="radio"
              class="color-radio"
              name="color"
              value="{{ $code }}"
              {{ $colorSeleccionado === $code ? 'checked' : '' }}
            >
            <div class="color-box" style="background-color: {{ $code }};"></div>
            <span style="font-size: 0.75rem;">{{ $label }}</span>
          </label>
        @endforeach

        {{-- Opción de color personalizado --}}
        <label style="cursor: pointer; text-align: center;">
          <input
            type="radio"
            class="color-radio"
            name="color"
            value="{{ $esPersonalizado ? $colorSeleccionado : '#000000' }}"
            {{ $esPersonalizado ? 'checked' : '' }}
            id="color-personalizado-radio"
          >
          <div class="color-box" style="padding: 0; overflow: hidden;">
            <input
              type="color"
              id="color-personalizado-input"
              name="color"
              value="{{ $esPersonalizado ? $colorSeleccionado : '#000000' }}"
              style="width: 100%; height: 100%; border: none; cursor: pointer;"
              oninput="document.getElementById('color-personalizado-radio').value = this.value"
              onclick="document.getElementById('color-personalizado-radio').checked = true"
            >
          </div>
          <span style="font-size: 0.75rem;">Otro</span>
        </label>
      </div>
    </div>

    <button type="submit" class="submit">Actualizar</button>
    <button class="volver">
    <a href="{{ route('categories.index') }}">
    Volver a Categorías
    </a>
    </button>
</form>

@endsection
