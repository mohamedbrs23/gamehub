@extends('layout')

@section('content')
<div class="bg-[#f9fafb] min-h-screen p-8 text-gray-900">
  <h2 class="text-2xl font-bold mb-6">✏️ Modifier le jeu</h2>

  <div class="space-y-6">
    <!-- Formulaire principal d'édition -->
    <form action="{{ route('admin.update', $game->id) }}" method="POST" class="bg-white p-6 rounded-2xl shadow-md max-w-xl">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label class="block font-medium mb-1">Titre</label>
        <input type="text" name="title" value="{{ $game->title }}" class="w-full p-3 border rounded-xl" required>
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-1">Image URL</label>
        <input type="url" name="image_url" value="{{ $game->image_url }}" class="w-full p-3 border rounded-xl" required>
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-1">Taille / Version</label>
        <input type="text" name="size" value="{{ $game->size }}" class="w-full p-3 border rounded-xl">
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-1">Plateformes</label>
        <select name="devices" class="w-full p-3 border rounded-xl">
          <option value="Android" {{ $game->devices == 'Android' ? 'selected' : '' }}>Android</option>
          <option value="iOS" {{ $game->devices == 'iOS' ? 'selected' : '' }}>iOS</option>
          <option value="Android,iOS" {{ $game->devices == 'Android,iOS' ? 'selected' : '' }}>Android & iOS</option>
        </select>
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-1">Note</label>
        <input type="number" step="0.1" name="rating" value="{{ $game->rating }}" class="w-full p-3 border rounded-xl">
      </div>

      <div class="mb-4">
        <label class="block font-medium mb-1">Locker URL</label>
        <input type="url" name="locker_url" value="{{ $game->locker_url }}" class="w-full p-3 border rounded-xl" required>
      </div>
      <div class="mb-4">
  <label class="block font-medium mb-1">Locker Key</label>
  <input type="text" name="locker_key" value="{{ old('locker_key', $game->locker_key ?? '') }}" class="w-full p-3 border rounded-xl">
</div>

<div class="mb-4">
  <label class="block font-medium mb-1">Locker IT</label>
  <input type="number" name="locker_it" value="{{ old('locker_it', $game->locker_it ?? '') }}" class="w-full p-3 border rounded-xl">
</div>

<div class="mb-4">
  <label class="block font-medium mb-1">Locker Script URL</label>
  <input type="url" name="locker_script_url" value="{{ old('locker_script_url', $game->locker_script_url ?? '') }}" class="w-full p-3 border rounded-xl">
</div>


      <button type="submit" class="mt-4 w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-xl text-lg font-semibold">
        💾 Enregistrer les modifications
      </button>
    </form>

    <!-- Section des captures d'écran -->
    <div class="bg-white p-6 rounded-2xl shadow-md max-w-xl">
      <h3 class="text-xl font-bold mb-4 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        Gestion des captures d'écran
      </h3>

      <!-- Formulaire d'ajout -->
      <form method="POST" action="{{ route('games.addScreenshot', $game->id) }}" class="mb-6">
        @csrf
        <div class="mb-4">
          <label class="block font-medium mb-1">URL de capture d'écran</label>
          <div class="flex gap-2">
            <input type="url" name="image_url"
                   class="flex-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500"
                   placeholder="https://example.com/screenshot.jpg" required>
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white py-3 px-4 rounded-xl font-medium">
              Ajouter
            </button>
          </div>
        </div>
      </form>

      <!-- Liste des captures -->
      <div>
        <h4 class="font-medium mb-3">Captures existantes</h4>

        @if($game->screenshots->isEmpty())
          <p class="text-gray-500 py-2">Aucune capture d'écran disponible</p>
        @else
          <div class="space-y-3">
            @foreach($game->screenshots as $screenshot)
              <div class="flex items-center justify-between p-3 border rounded-xl">
                <div class="flex items-center space-x-3">
                  <img src="{{ $screenshot->image_url }}"
                       class="h-12 w-auto rounded-lg object-cover"
                       onerror="this.src='https://via.placeholder.com/100?text=Image+Error'">
                  <span class="text-sm truncate max-w-xs">{{ $screenshot->image_url }}</span>
                </div>
                <form method="POST" action="{{ route('games.deleteScreenshot', $screenshot->id) }}">
                  @csrf @method('DELETE')
                  <button type="submit"
                          class="text-red-500 hover:text-red-700 p-2"
                          onclick="return confirm('Supprimer cette capture ?')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </form>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
