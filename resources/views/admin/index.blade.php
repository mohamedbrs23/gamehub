@extends('layout')

@section('content')
<h2 class="text-xl font-bold mb-4">Admin - Games</h2>

{{-- Affiche le message de succès s’il existe --}}
@if (session('success'))
  <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
    {{ session('success') }}
  </div>
@endif

<a href="{{ route('admin.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
  ➕ Add New Game
</a>

<table class="mt-6 w-full text-left bg-white rounded-xl shadow">
  <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
    <tr>
      <th class="p-3">Titre</th>
      <th class="p-3">Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($games as $game)
      <tr class="border-b hover:bg-gray-50">
        <td class="p-3 text-black font-semibold">{{ $game->title }}</td>
        <td class="p-3 flex gap-2">
          <a href="{{ route('admin.edit', $game->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">✏️ Modifier</a>
          <form action="{{ route('admin.destroy', $game->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">🗑️ Supprimer</button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="2" class="p-3 text-center text-gray-500">Aucun jeu disponible.</td>
      </tr>
    @endforelse
  </tbody>
</table>


@endsection
