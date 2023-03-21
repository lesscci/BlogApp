<x-app-layout>
  <div class="container">
    <h1 class="text-2xl font-bold mb-4">Editar post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label for="title" class="block font-medium text-gray-700">Título</label>
        <input type="text" class="form-input mt-1 block w-full rounded-md shadow-sm" id="title" name="title" value="{{ $post->title }}">
      </div>

      <div class="mb-4">
        <label for="cont" class="block font-medium text-gray-700">Contenido</label>
        <textarea class="form-textarea mt-1 block w-full rounded-md shadow-sm" id="cont" name="cont">{{ $post->cont }}</textarea>
      </div>

      <div class="flex items-center justify-end mt-4">
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-white tracking-wide hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue disabled:opacity-25 transition ease-in-out duration-150">
          Actualizar post
        </button>
      </div>
    </form>
  </div>
</x-app-layout>