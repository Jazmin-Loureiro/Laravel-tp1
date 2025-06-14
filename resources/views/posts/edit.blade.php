<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Post') }}
        </h2>
    </x-slot>

    <div class="flex justify-center bg-gray-100 mb-5">
        <div class="w-full bg-white rounded-lg shadow-md p-6 md:p-8 relative ">
            <form class="flex flex-col md:flex-row md:gap-8" action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="flex justify-center md:justify-end items-center gap-2 md:absolute md:top-1 md:right-6 z-10">
                    <label class="switch cursor-pointer relative flex w-[6.7rem] scale-75 overflow-hidden p-2 m-0">
                        <input type="hidden" name="habilitated" value="0" />
                        <input type="checkbox" name="habilitated" value="1" class="peer hidden" id="toggle_switch"
                            {{ $post->habilitated ? 'checked' : '' }}/>
                        <div class="absolute -right-[6.5rem] z-[1] flex h-12 w-24 skew-x-12 items-center justify-center text-sm sm:text-base duration-500 peer-checked:right-1">
                            <span class="-skew-x-12">ACTIVO</span>
                        </div>
                        <div class="z-0 h-12 w-24 -skew-x-12 border border-black duration-500 peer-checked:skew-x-12 peer-checked:bg-green-500"></div>
                        <div class="absolute left-[0.3rem] flex h-12 w-24 -skew-x-12 items-center justify-center text-sm sm:text-base duration-500 peer-checked:-left-[6.5rem]">
                            <span class="skew-x-12">INACTIVO</span>
                        </div>
                    </label>
                </div>

                <div class="w-full md:w-1/2">
                    <label for="poster" class="cursor-pointer group block w-full h-64 sm:h-80 md:h-[500px] relative rounded-lg overflow-hidden">
                        <img id="preview" src="{{ asset('storage/' . $post->poster) }}" alt="poster"
                            class="rounded-lg shadow-md w-full h-full object-cover object-center opacity-75 transition" />
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30 transition rounded-lg">
                            <span class="text-white font-semibold">Cambiar Imagen</span>
                        </div>
                    </label>
                    <input type="file" id="poster" name="poster" class="hidden" accept="image/*" onchange="previewImage(event)" />
                </div>

                <div class="w-full md:w-1/2 flex flex-col justify-between">
                    <div class="space-y-3 mt-2">
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título del post  
                                <span class="text-gray-400 text-xs">(máx. 50 caracteres)</span>
                            </label>
                            <input type="text" id="title" name="title" maxlength="50" value="{{ old('title', $post->title) }}"
                                class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                placeholder="Título" required oninput="actualizarContador('title', 'contador-title', 50)" />
                            <small id="contador-title" class="block mt-1 text-xs text-gray-500">
                                {{ 50 - strlen(old('title', $post->title)) }} caracteres restantes
                            </small>
                        </div>

                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenido del post  
                                <span class="text-gray-400 text-xs">(máx. 1500 caracteres)</span>
                            </label>
                            <textarea id="content" name="content" rows="9" maxlength="1500"
                                class="resize-y w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 break-words whitespace-pre-line"
                                placeholder="Contenido" required oninput="actualizarContador('content', 'contador-content', 1500)">{{ old('content', $post->content) }}</textarea>
                            <small id="contador-content" class="block mt-1 text-xs text-gray-500">
                                {{ 1500 - strlen(old('content', $post->content)) }} caracteres restantes
                            </small>
                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
                            <select id="category_id" name="category_id"
                                class="w-full p-3 bg-gray-100 text-gray-900 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                required>
                                <option value="">Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mt-6">
                        <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="text-sm text-blue-600 hover:underline">← Volver</a>
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-full transition-transform transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-300 whitespace-nowrap">
                            Guardar Cambios
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                document.getElementById('preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        function actualizarContador(inputId, contadorId, maxLength) {
            const input = document.getElementById(inputId);
            const contador = document.getElementById(contadorId);
            const restante = maxLength - input.value.length;
            contador.textContent = `${restante} caracteres restantes`;
        }

        document.addEventListener('DOMContentLoaded', () => {
            actualizarContador('title', 'contador-title', 50);
            actualizarContador('content', 'contador-content', 1500);
        });
    </script>
</x-app-layout>
