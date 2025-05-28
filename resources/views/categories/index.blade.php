@extends('layout')

@section('content')
    <h2 style="margin-bottom: 20px;">Mira aquí tus Categorias</h2>

    @foreach ($categories as $category)
        <div style="margin-bottom: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            <h3 style="margin: 0;">
                <a href="{{ route('categories.show', ['id' => $category->id]) }}" style="text-decoration: none; color: #333;">
                    {{ $category->name }}
                </a>
            </h3>
        </div>
    @endforeach

@endsection