@include('layouts.master')

<div class="max-x-screen-xl mx-auto">

    <main class="mt-10">

    <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 4em;">
  <div class="absolute left-0 bottom-0 w-full h-full z-10">
    <img src="/storage/{{ $post->image_url}}" alt="{{ $post->title }}" >
  </div>
  <div class="p-4 absolute bottom-0 left-0 z-20">
    <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
      {{$post->title}}
    </h2>
  </div>
</div>

<div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
  <p class="pb-6">{{$post->cont}}</p>
</div>

        <div class="rating-section">
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

<script>
    const stars = document.querySelectorAll('.stars input[type="radio"]');
    const ratingValue = document.querySelector('#rating_value');

    stars.forEach(star => {
        star.addEventListener('change', () => {
            ratingValue.value = star.value;
        });
    });
</script>

    </main>
</div>