@php
  use Illuminate\Support\Str;
@endphp
@extends('layout')

@section('content')
<div class="bg-[#f2f4f8] min-h-screen text-gray-900 font-sans p-6">

  {{-- Top Bar : titre + tri + recherche --}}
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">{{ __('messages.trending') }}</h2>

    <div class="flex gap-4 items-center">
      <form method="GET">
        <select name="sort" onchange="this.form.submit()" class="bg-white border px-3 py-2 rounded-lg shadow-sm">
          <option value="latest" {{ $sort == 'latest' ? 'selected' : '' }}>{{ __('messages.sort_latest') }}</option>
          <option value="rating" {{ $sort == 'rating' ? 'selected' : '' }}>{{ __('messages.sort_rating') }}</option>
          <option value="size" {{ $sort == 'size' ? 'selected' : '' }}>{{ __('messages.sort_size') }}</option>
        </select>
      </form>
      <input id="searchInput" type="text" placeholder="{{ __('messages.search_placeholder') }}" class="bg-white border px-4 py-2 rounded-lg shadow-sm w-64">
    </div>
  </div>

  {{-- Grille des jeux --}}
  <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6" id="gamesGrid">
    @foreach ($games as $game)
      <div class="bg-white rounded-2xl p-4 shadow-md flex flex-col items-center text-center game-card" data-title="{{ strtolower($game->title) }}">
        <div class="relative w-20 h-20 mb-3">
          <img src="{{ $game->image_url }}" alt="{{ $game->title }}" class="rounded-xl w-full h-full object-cover">

          @if (Str::contains(strtolower($game->title), 'mod'))
            <span class="absolute top-0 left-0 bg-purple-600 text-white text-xs px-2 py-1 rounded-br-xl">MOD</span>
          @elseif (Str::contains(strtolower($game->title), 'update'))
            <span class="absolute top-0 left-0 bg-blue-500 text-white text-xs px-2 py-1 rounded-br-xl">UPDATE</span>
          @endif
        </div>

        <h4 class="font-semibold text-sm">{{ $game->title }}</h4>
        <p class="text-xs text-blue-600">{{ __('messages.category') ?? 'Action' }}</p>

        {{-- Infos principales --}}
        <div class="flex justify-center gap-6 text-xs text-gray-500 mt-2">
          <div class="flex items-center gap-1">
            <img src="ANDROID.webp" class="w-4 h-4"> {{ $game->devices }}
          </div>
          <div class="flex items-center gap-1">
            ⚡ {{ $game->size }}
          </div>
        </div>

        {{-- Rating --}}
        <p class="mt-2 text-yellow-500 text-sm">⭐ {{ $game->rating }}</p>

        {{-- Téléchargements --}}
        <p class="mt-1 text-xs text-gray-500 flex items-center gap-1">
          <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 3a1 1 0 011-1h12a1 1 0 011 1v9a1 1 0 01-1 1h-3l-2 3-2-3H4a1 1 0 01-1-1V3z" />
          </svg>
          {{ fake_download_count($game->id) }} téléchargements
        </p>

        {{-- Bouton Télécharger --}}
      <a href="{{ route('game.show', $game->id) }}"
   class="mt-3 inline-flex items-center gap-2 px-4 py-1 bg-purple-600 text-white text-sm rounded-full hover:bg-purple-700">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v6m0 0l-3-3m3 3l3-3m-3-9v6" />
  </svg>
  {{ __('messages.install') }}
</a>

      </div>
    @endforeach
  </div>
</div>

{{-- JS Recherche par titre --}}
<script>
  const input = document.getElementById('searchInput');
  input.addEventListener('keyup', () => {
    const filter = input.value.toLowerCase();
    document.querySelectorAll('.game-card').forEach(card => {
      const title = card.getAttribute('data-title');
      card.style.display = title.includes(filter) ? '' : 'none';
    });
  });
</script>

{{-- Fake Downloads Helper --}}
@php
  function fake_download_count($id) {
    return rand(5, 80) . 'K';
  }
@endphp
@endsection
