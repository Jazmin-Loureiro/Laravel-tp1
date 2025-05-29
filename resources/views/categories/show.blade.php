@extends('layout')

@section('content')
<style>
  .categoria-container {
    max-width: 720px;
    margin: 60px auto;
    background-color: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
    font-family: 'Inter', sans-serif;
  }

  .categoria-header {
    height: 8px;
    background-color: var(--color);
  }

  .categoria-body {
    padding: 32px;
  }

  .categoria-title {
    font-size: 2rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 12px;
  }

  .categoria-description {
    color: #4b5563;
    margin-bottom: 24px;
    line-height: 1.6;
  }

  .categoria-estado {
    font-size: 0.9rem;
    font-weight: bold;
    margin-bottom: 32px;
  }

  .btn-editar-categoria {
    display: inline-block;
    background-color: #3b82f6;
    color: white;
    padding: 10px 16px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.3s ease;
    margin-bottom: 24px;
  }

  .btn-editar-categoria:hover {
    background-color: #2563eb;
  }

  .categoria-posts {
    background-color: #f9fafb;
    padding: 24px 32px;
    border-top: 1px solid #e5e7eb;
  }

  .categoria-posts-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #111827;
    margin-bottom: 16px;
  }

  .categoria-posts-list a {
    color: #4f46e5;
    text-decoration: none;
    font-weight: 500;
  }

  .categoria-posts-list a:hover {
    text-decoration: underline;
  }

  .categoria-no-posts {
    color: #6b7280;
    font-style: italic;
    margin-bottom: 16px;
  }

  .categoria-posts-list li::before {
    content: "📌 ";
  }

  .btn-crear-post, .btn-volver {
    display: inline-block;
    background-color: #7c3aed;
    color: white;
    padding: 10px 16px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .btn-crear-post:hover,
  .btn-volver:hover {
    background-color: #5b21b6;
  }

  .btn-volver {
    margin: 20px 32px;
  }
</style>

<div class="categoria-container" style="--color: {{ $category->color ?? '#7c3aed' }}">
  <div class="categoria-header"></div>
  <div class="categoria-body">
    <h2 class="categoria-title">{{ $category->name }}</h2>
    <p class="categoria-description">{{ $category->description }}</p>
    <p class="categoria-estado" style="color: {{ $category->habilitated ? '#16a34a' : '#dc2626' }};">
      {{ $category->habilitated ? 'Habilitada' : 'Deshabilitada' }}
    </p>

    <a href="{{ route('categories.edit', $category->id) }}" class="btn-editar-categoria">Editar Categoría</a>
  </div>

  <div class="categoria-posts">
    <h3 class="categoria-posts-title">Posts de esta categoría</h3>

    @if ($category->posts->count())
      <ul class="categoria-posts-list space-y-2">
        @foreach ($category->posts as $post)
          <li>
            <a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a>
          </li>
        @endforeach
      </ul>
    @else
      <p class="categoria-no-posts">No hay posts en esta categoría.</p>
      <a href="{{ route('posts.create') }}" class="btn-crear-post">Crear un nuevo post</a>
    @endif
  </div>

  <a href="{{ route('categories.index') }}" class="btn-volver">← Volver a Categorías</a>
</div>
@endsection
