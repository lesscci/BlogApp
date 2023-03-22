<x-app-layout>


  <main class="mt-10">
    <div class="w-full ml-4 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      @if($post->image_url)
      <div class=" left-0 bottom-0 w-full h-full z-10">
        <img src="/storage/{{ $post->image_url}}" alt="{{ $post->title }}">
      </div>
      @endif
      <div class="mt-4 ml-2">
        <h2 class="text-4xl  font-semibold text-black-100 leading-tight">
          {{$post->title}}
        </h2>
        <p class="pb-6">{{$post->cont}}</p>
      </div>
    </div>

  


    <div class="rating-section  ml-4 mt-4 ">
      <h2>Valoración:</h2>
      <form action="{{ route('posts.rate', $post->id) }}" method="POST">
        @csrf
        <div class="stars">
          <input type="radio" name="rating" id="star-5" value="5">
          <label for="star-5" class="star"><i class="fas fa-star"></i></label>
          <input type="radio" name="rating" id="star-4" value="4">
          <label for="star-4" class="star"><i class="fas fa-star"></i></label>
          <input type="radio" name="rating" id="star-3" value="3">
          <label for="star-3" class="star"><i class="fas fa-star"></i></label>
          <input type="radio" name="rating" id="star-2" value="2">
          <label for="star-2" class="star"><i class="fas fa-star"></i></label>
          <input type="radio" name="rating" id="star-1" value="1">
          <label for="star-1" class="star"><i class="fas fa-star"></i></label>
        </div>
        <i class="fas fa-star"></i>
        <input type="hidden" name="rating_value" id="rating_value">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
  </main>
  </div>
  </div>
</x-app-layout>