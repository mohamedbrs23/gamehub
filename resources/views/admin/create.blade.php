@extends('layout')

@section('content')
<div class="bg-[#f9fafb] min-h-screen p-8 text-gray-900">
  <h2 class="text-2xl font-bold mb-6">🎮 Ajouter un nouveau jeu</h2>

  <form action="{{ route('admin.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow-md max-w-xl">
    @csrf
    <div class="mb-4">
      <label class="block font-medium mb-1">Titre</label>
      <input type="text" name="title" class="w-full p-3 border rounded-xl" required>
    </div>

    <div class="mb-4">
      <label class="block font-medium mb-1">Image URL</label>
      <input type="url" name="image_url" class="w-full p-3 border rounded-xl" required>
    </div>

    <div class="mb-4">
      <label class="block font-medium mb-1">Taille / Version</label>
      <input type="text" name="size" class="w-full p-3 border rounded-xl">
    </div>

    <div class="mb-4">
      <label class="block font-medium mb-1">Plateformes</label>
      <select name="devices" class="w-full p-3 border rounded-xl">
        <option value="Android">Android</option>
        <option value="iOS">iOS</option>
        <option value="Android,iOS">Android & iOS</option>
      </select>
    </div>

    <div class="mb-4">
      <label class="block font-medium mb-1">Note</label>
      <input type="number" step="0.1" name="rating" class="w-full p-3 border rounded-xl">
    </div>

    <div class="mb-4">
      <label class="block font-medium mb-1">Locker URL</label>
      <input type="url" name="locker_url" class="w-full p-3 border rounded-xl" required>
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
  <label class="block font-medium mb-1">Lien final (après content locker)</label>
  <input type="url" name="final_url" class="w-full p-3 border rounded-xl">
</div>



    <button type="submit" class="mt-4 w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-xl text-lg font-semibold">
      ➕ Ajouter le jeu
    </button>
  </form>
  @if ($errors->any())
    <div class="bg-red-200 text-red-900 p-4 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>


@endsection

