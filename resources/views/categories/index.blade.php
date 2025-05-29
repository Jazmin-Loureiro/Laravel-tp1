@extends('layout')

@section('content')

<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

  .card-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    margin-top: 40px;
  }

  .card {
    --card-bg: #ffffff;
    --card-text: #1e293b;
    width: 190px;
    height: 254px;
    background: var(--card-bg);
    border-radius: 20px;
    position: relative;
    overflow: hidden;
    transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    border: 2px solid rgba(255, 255, 255, 0.2);
    font-family: 'Inter', sans-serif;
  }

  .card__glow {
    position: absolute;
    inset: -10px;
    background: radial-gradient(circle at 50% 0%, rgba(124, 58, 237, 0.3) 0%, rgba(124, 58, 237, 0) 70%);
    opacity: 0;
    transition: opacity 0.5s ease;
  }

  .card__content {
    padding: 1.25em;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 0.75em;
    position: relative;
    z-index: 2;
  }

  .card__image {
    width: 100%;
    height: 100px;
    border-radius: 12px;
    background: var(--color);
  }

  .card__title {
    color: var(--card-text);
    font-size: 1.1em;
    font-weight: 700;
    margin: 0;
  }

  .card__description {
    color: var(--card-text);
    font-size: 0.75em;
    opacity: 0.7;
    margin: 0;
  }

  .card__footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
  }

  .card__button {
    width: 28px;
    height: 28px;
    background: var(--color);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow:
      0 20px 25px -5px rgba(0, 0, 0, 0.1),
      0 10px 10px -5px rgba(0, 0, 0, 0.04);
  }

  .card-disabled {
    filter: grayscale(100%);
    opacity: 0.6;
    position: relative;
  }



</style>

<h2 class="text-center text-3xl font-bold text-gray-800 mb-6">Mirá aquí tus Categorías</h2>

<div class="card-grid">
  @foreach ($categories as $category)
    <div class="card {{ !$category->habilitated ? 'card-disabled' : '' }}" style="--color: {{ $category->color ?? '#7c3aed' }}">
      <div class="card__glow"></div>
      <div class="card__content">
        <div class="card__image"></div>
        <div>
          <p class="card__title">
            <a href="{{ route('categories.show', ['id' => $category->id]) }}" style="text-decoration: none; color: inherit;">
              {{ $category->name }}
            </a>
          </p>
          <p class="card__description">{{ Str::limit($category->description, 60) }}</p>
        </div>
        <div class="card__footer">
          <span style="font-size: 0.65rem; font-weight: bold; color: {{ $category->habilitated ? '#16a34a' : '#dc2626' }}">
            {{ $category->habilitated ? 'Habilitada' : 'Deshabilitada' }}
          </span>
          <a href="{{ route('posts.create') }}" class="card__button">+</a>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection
