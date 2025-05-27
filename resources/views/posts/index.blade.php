@extends('layout')

@section('content')
    <h2 style="margin-bottom: 20px;">Mira aquí tus Posts</h2>

    @foreach ($posts as $post)
        <div style="margin-bottom: 15px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            <h3 style="margin: 0;">
                <a href="{{ route('posts.show', ['id' => $post->id]) }}" style="text-decoration: none; color: #333;">
                    {{ $post->title }}
                </a>
            </h3>
        </div>
    @endforeach
@endsection
