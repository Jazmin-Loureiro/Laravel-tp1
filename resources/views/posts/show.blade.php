<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del Post') }}
        </h2>
    </x-slot>

<div class="bg-white rounded-lg shadow-md overflow-hidden w-full max-w-full sm:w-[1200px] mx-auto flex flex-col justify-between p-6 mb-5">
        <div class="flex flex-col sm:flex-row justify-between mb-4 text-sm text-gray-600">
            <div>
                <span class="font-semibold text-gray-700">Creado:</span>
                {{ optional($post->created_at)->format('d/m/Y') ?? 'No disponible' }}
            </div>
            <div>
                <span class="font-semibold text-gray-700">Actualizado:</span>
                {{ optional($post->updated_at)->format('d/m/Y') ?? 'No disponible' }}
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-6 items-start">
            <div  x-data="{ showModal: false }" class="w-full max-w-[500px] h-[250px] md:h-[400px] rounded-lg overflow-hidden shadow-md mx-auto md:mx-0 flex-shrink-0 relative group">
                <img src="{{ asset('storage/' . $post->poster) }}"  alt="Imagen del post {{ $post->title }}" class="w-full h-full object-cover object-center rounded-xl cursor-pointer"  @click="showModal = true"/>
                    <div class="absolute top-2 left-2 bg-gray-100/80 text-gray-700 text-xs font-medium px-3 py-1 rounded-full shadow-sm group-hover:bg-gray-200/90 pointer-events-none">
                         Ver imagen
                    </div>

                <div x-show="showModal"  x-transition  class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50"x-cloak>
                     <div class="relative">
                      <button  @click="showModal = false" class="absolute top-2 right-2 text-indigo-600 text-3xl font-bold hover:text-indigo-800" aria-label="Cerrar">&times;</button>
                      <img src="{{ asset('storage/' . $post->poster) }}"   alt="Imagen del post ampliada"  class="max-h-[90vh] max-w-[90vw] object-contain rounded-lg shadow-lg"/>
                      </div>
                </div>
            </div>

            <div class="flex-1 min-w-0">
                <div class="flex justify-between items-start flex-wrap gap-y-2 mb-2">
                    <h1 class="text-2xl font-extrabold text-gray-900 break-all">
                        {{ $post->title }}
                    </h1>
                    <span class="text-sm text-indigo-600 font-semibold">
                        {{ $post->category->name ?? 'Sin categoría' }}
                    </span>
                </div>

                <div class="max-w-none text-gray-700 break-words break-all overflow-y-auto max-h-[400px] whitespace-pre-line">
                    {{ $post->content }}
                </div>
            </div>
        </div>

        <div class="flex justify-end items-center gap-4 mt-6 flex-wrap">
            <a href="{{ route('posts.index') }}" class="text-sm text-indigo-600 hover:underline">
                ← Volver
            </a>

            <a href="{{ route('posts.edit', $post->id) }}" 
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-full transition transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300 whitespace-nowrap">
                Editar
            </a>
        </div>
    </div>
</x-app-layout>
