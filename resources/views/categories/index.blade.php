@extends('layout')

@section('content')

<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

  .card-grid {
    display: flex;
    flex-direction: column;
    gap: 16px;
    max-width: 800px;
    margin: 0 auto;
    margin-top: 40px;
    font-family: 'Inter', sans-serif;
  }

  .card {
    display: flex;
    background: white;
    border-radius: 12px;
    padding: 16px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
    align-items: center;
    justify-content: space-between;
    transition: transform 0.2s ease;
  }

  .card:hover {
    transform: scale(1.01);
  }

  .card-disabled {
    filter: grayscale(100%);
    opacity: 0.6;
  }

  .card__color {
    width: 48px;
    height: 48px;
    border-radius: 10px;
    background: var(--color);
    margin-right: 16px;
    flex-shrink: 0;
  }

  .card__info {
    flex: 1;
  }

  .card__title {
    font-weight: 700;
    font-size: 1rem;
    margin: 0;
    color: #1e293b;
  }

  .card__description {
    font-size: 0.85rem;
    color: #6b7280;
    margin: 4px 0 0;
  }

  .card__meta {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .card__status {
    font-size: 0.8rem;
    font-weight: bold;
    color: #16a34a;
  }

  .card__status.deshabilitada {
    color: #9ca3af;
  }

  .card__button {
    width: 32px;
    height: 32px;
    background: var(--color);
    border-radius: 50%;
    color: white;
    font-size: 20px;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: background 0.3s ease;
  }

  .card__button:hover {
    background: #00000033;
  }
</style>

<h2 class="text-center text-3xl font-bold text-gray-800 mb-6">Mirá aquí tus Categorías</h2>

<div class="card-grid">
  @foreach ($categories as $category)
    <div class="card {{ !$category->habilitated ? 'card-disabled' : '' }}" style="--color: {{ $category->color ?? '#7c3aed' }}">
      <div class="card__color"></div>
      <div class="card__info">
        <p class="card__title">
          <a href="{{ route('categories.show', ['id' => $category->id]) }}" style="text-decoration: none; color: inherit;">
            {{ $category->name }}
          </a>
        </p>
        <p class="card__description">{{ Str::limit($category->description, 60) }}</p>
      </div>
      <div class="card__meta">
        <span class="card__status {{ !$category->habilitated ? 'deshabilitada' : '' }}">
          {{ $category->habilitated ? 'Habilitada' : 'Deshabilitada' }}
        </span>
        <a href="{{ route('posts.create', ['category_id' => $category->id]) }}" class="card__button">+</a>
      </div>
    </div>
  @endforeach
</div>

@endsection