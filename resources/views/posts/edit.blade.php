@extends('layout')

@section('content')

<style>
  
  .form {
    max-width: 500px;
    margin: 50px auto;
    padding: 30px 25px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    transition: box-shadow 0.3s ease;
  }
  .form:hover {
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
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

  .form img {
    display: block;
    max-width: 100%;
    border-radius: 10px;
    margin: 0 auto 25px auto;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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
  .submit:hover {
    background-color: #0056b3;
  }

  h1 {
    text-align: center;
    margin-bottom: 35px;
    font-weight: 700;
    color: #222;
    user-select: none;
  }
</style>

<h1>Editar Post</h1>
<form class="form" action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf 
    @method('POST')

    <div class="form-row">
      <label for="title">Título</label>
      <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
    </div>

    <div class="form-row">
      <label for="poster">Poster URL</label>
      <input type="text" id="poster" name="poster" value="{{ old('poster', $post->poster) }}" required>
    </div>

    @if ($post->poster)
        <img src="{{ $post->poster }}" alt="Imagen del post">
    @endif

    <div class="form-row">
      <label for="content">Contenido</label>
      <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
    </div>

    <div class="form-row">
      <label for="status">Estado</label>
      <select id="habilitated" name="habilitated" required>
        <option value="0" {{ $post->habilitated === 0 ? 'selected' : '' }}>Activo</option>
        <option value="1" {{ $post->habilitated === 1 ? 'selected' : '' }}>Desactivado</option>
      </select>

    </div>

    <button type="submit" class="submit">Actualizar</button>
</form>

@endsection
