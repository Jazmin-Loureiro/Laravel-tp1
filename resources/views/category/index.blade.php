@extends('layout')

@section('content')
    <h2 class="text-4xl font-bold text-center">Categorías</h2>

    @foreach ($categories as $category)
        <h4>{{ $category->title }}</h4>
    @endforeach

@endsection