<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('POST') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6" bg-white border-b border-gray-200>

                    <button class="text-white right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
                        Nuevo post
                    </button>

                    <form action="{{ url()->current() }}" method="get">

                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" name="term" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Busca tu post favorito ❤️" required>
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>

                    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
                        <form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            NuevoPost
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-model-toggle="defaultModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414L8.586 10 4.293 5.707a1 1 0 071-1.414z" clip-rule="envenodd"></path>
                                            </svg>
                                            <span class="sr-only"> Close Modal </span>
                                        </button>
                                    </div>

                                    <!-- Cuerpo -->
                                    <div class="p-6 space-y-6">
                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                            Vamos a crear un nuevo post para nuestro blog. Rellena los campos:
                                        </p>
                                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Título</label>
                                        <input type="text" name="title" id="title" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tag</label>
                                        <select name="tag_id" id="tag" class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            @foreach(DB::table('tags')->get() as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                            @endforeach
                                        </select>

                                        <label for="cont" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Contenido</label>
                                        <textarea id="cont" name="cont" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Imagen</label>

                                        <input class="block w-full text-sm text-gray-900 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" name="image">
                                    </div>

                                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                        <button data-modal-toggle="defaultModal" type="submit" class="text-blue-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"> Crear </button>
                                        <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"> Cerrar </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if(Auth::user()->role_id == 2)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                Autor
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Título
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Contenido
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acción
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                      
                        <h1 class="text-3xl font-semibold m-4 text-gray-700 capitalize lg:text">Todos los posts (Admin)</h1>
                        @foreach ($posts as $post)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <!--Imagen/ID -->
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if($post->image_url)
                                <img class="max-w-xs h-auto" src="{{ asset('storage/'.$post->image_url) }}">
                                @else
                                <span></span>
                                @endif
                            </th>
                            <td class="px-6 py-4">

                                {{$post->user->name}}
                            </td>
                            <!--Título -->
                            <td class="px-6 py-4">
                                {{$post->title}}
                            </td>

                            <!--Contenido -->
                            <td class="px-6 py-4">
                                <span style="display: inline-block; width:180px; white-space:nowrap; overflow:hidden !important; text-overflow:ellipsis;">
                                    {{$post->cont}}</span>

                            </td>
                            <!--Fecha -->
                            <td class="px-6 py-4">
                                {{$post->created_at}}
                            </td>

                            <!--Acción -->
                            <td class="px-6 py-4">
                                <a href="{{ route('posts.edit', $post->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar </a>
                                <a href="{{ route('posts.delete', $post->id) }}" class="font-medium text-red-600 dark:text-blue-500 hover:underline"> Borrar</a>

                            </td>
                        </tr>
                        @endforeach
                        @endif

                    </tbody>
                </table>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">

                            </th>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Título
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Contenido
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fecha
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acción
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        <h1 class="text-3xl font-semibold m-4 text-gray-700 capitalize lg:text">Todos mis posts 😍</h1>
                        @foreach ($posts as $post)
                        @if (Auth::id() == $post->user_id)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <!--Imagen/ID -->
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if($post->image_url)
                                <img class="max-w-xs h-auto" src="{{ asset('storage/'.$post->image_url) }}">
                                @else
                                <span></span>
                                @endif
                            </th>
                            <td class="px-6 py-4">

                                {{$post->id}}
                            </td>
                            <!--Título -->
                            <td class="px-6 py-4">
                                {{$post->title}}
                            </td>

                            <!--Contenido -->
                            <td class="px-6 py-4">
                                <span style="display: inline-block; width:180px; white-space:nowrap; overflow:hidden !important; text-overflow:ellipsis;">
                                    {{$post->cont}}</span>

                            </td>
                            <!--Fecha -->
                            <td class="px-6 py-4">
                                {{$post->created_at}}
                            </td>

                            <!--Acción -->
                            <td class="px-6 py-4">
                                <a href="{{ route('posts.edit', $post->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar </a>
                                <a href="{{ route('posts.delete', $post->id) }}" class="font-medium text-red-600 dark:text-blue-500 hover:underline"> Borrar</a>

                            </td>
                        </tr>
                        @endif
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
</x-app-layout>