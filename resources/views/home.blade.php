<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900 dark:text-gray-100 leading-tight">
            ¡Hola, <span class="text-indigo-600">{{ Auth::user()->name }}</span>! Qué bueno verte de nuevo 😊
        </h2>
    </x-slot>

    <div class="p-0 md:p-2 max-w-7xl mx-auto space-y-10 mb-5">

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-gray-800 dark:text-gray-200">
            <p class="text-lg mb-4">Has creado <strong class="text-indigo-600">{{ $postsCount }}</strong> posts hasta ahora.</p>

            <div>
                <h4 class="text-lg font-semibold mb-3 text-gray-900 dark:text-gray-100">Categorías más populares</h4>
                <ul class="list-disc list-inside space-y-1">
                    @foreach($popularCategories as $category)
                        <li>
                            <span class="font-medium text-indigo-600">{{ $category->name }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">({{ $category->posts_count }} posts)</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-6">Últimos Posts</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($latestPosts as $post)
                    <div class="flex flex-col rounded-lg  bg-white text-gray-700 shadow-md hover:shadow-xl transition-shadow p-6">
                        <div class="relative rounded-lg  shadow-lg overflow-hidden">
                            <img src="{{ asset('storage/' . $post->poster) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover object-center"/>
                        </div>
                        <div class="flex-1 mt-4">
                            <h5 class="mb-2 text-xl font-semibold leading-snug text-blue-gray-900">
                                {{ $post->title }}
                            </h5>
                            <p class="text-base font-light leading-relaxed text-gray-700 line-clamp-3">
                                {{ Str::limit($post->content, 100) }}
                            </p>
                        </div>
                        <div class="pt-4">
                            <a href="{{ route('posts.show', ['id' => $post->id]) }}">
                                <button class="w-full max-w-xs mx-auto block rounded-lg bg-blue-500 py-2 px-4 text-sm font-semibold text-white hover:bg-blue-600 transition-all" type="button">
                                    Leer más
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</x-app-layout>
