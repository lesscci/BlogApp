
<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text">
                Post Recientes
            </h1>
            <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2">
                @foreach ($posts as $post)
                <div class="lg:flex">
                    @if($post->image_url)
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('storage/'.$post->image_url) }}" alt="">

                    @endif <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="{{route('posts.view',$post->id)}}" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white">
                            {{$post->title}}
                        </a>
                        <span class="text-sm text-gray-500 dark:text-gray-300">En {{\Carbon\Carbon::parse($post->created_at)->format('l jS \\of F Y h:i:s A')}}</span>

                        <!-- Agregar la sección de comentarios aquí -->
                        <div class="comments-section mt-4">
                            <h2>Comentarios</h2>

                            <!-- Mostrar los comentarios existentes -->
                            @if(count($post->comments) > 0)
                            <ul class="comments-list">
                                @foreach($post->comments as $comment)
                                <li>
                                    <div class="comment">
                                        <div class="comment-meta">
                                            <span class="comment-author">{{ $comment->user->name }}</span>
                                            <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                                            @if(auth()->check() && $comment->user_id === auth()->user()->id)
                                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                                            </form>
                                            @endif
                                        </div>
                                        <div class="comment-body">{{ $comment->comment }}</div>
                                    </div>

                                    @if(auth()->check() && $comment->user_id === auth()->user()->id)

                                    <!-- Formulario para editar un comentario -->

                                    <form action="{{ route('comments.update', $comment) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control" rows="3" autocomplete="off">

                                            </textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Actualizar comentario</button>
                                    </form>
                                    @endif
                                    @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                </li>

                                @endforeach
                            </ul>
                            @else
                            <p>No hay comentarios todavía.</p>
                            @endif

                            <!-- Agregar un comentario nuevo -->
                            @auth
                            <h4>Añadir un comentario</h4>
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" rows="3" placeholder="Escribe tu comentario aquí..."></textarea>
                                </div>

                                <button type="submit" cclass="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">Comentar</button>
                            </form>
                            @endauth
                            @guest
                            <h4>Tienes que registrarte para hacer un comentario</h4>
                            @endguest
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
