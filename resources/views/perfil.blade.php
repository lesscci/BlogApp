<x-app-layout>

    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-8">
                <div class="card ml-4 mb-4 mt-4">
                    <div class="card-header">
                        <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text"> Mi perfil </h1>


                        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-end px-4 pt-4">
                            </div>
                            <div class="flex flex-col items-center pb-10">
                      
                                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ ucfirst(Auth::user()->name )}}</h5>
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</span>
                                <div class="flex mt-4 space-x-3 md:mt-6">

                                    <a href="{{ url('/posts') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir Post</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="card-body ml-4 mb-4 mt-4">
                        <hr>
                        <h4 class="text-3xl font-semibold text-gray-700 capitalize lg:text"> Post Publicados</h4>
                        @foreach(Auth::user()->posts as $post)
                        <ul>
                            <li><a href="{{ route('posts.view', $post) }}">{{ $post->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                  
                    <div class="card-body ml-4 mb-4 mt-4">
                        <hr>

                        <h4 class="text-3xl font-semibold text-gray-700 capitalize lg:text"> Administrador </h4>

                        <a href="{{ route('datos.admin') }}" class="inline-flex items-center px-4 py-2 text-sm 
                        font-medium text-center text-white mt-4 bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 
                        focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 
                        dark:focus:ring-blue-800">Administrar Sitio </a>
                        @if(auth()->user()->role_id ==2 )
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>