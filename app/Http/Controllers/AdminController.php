<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Screenshot;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('admin.index', compact('games'));
    }

    public function create()
    {
        return view('admin.create');
    }

   public function store(Request $request)
{
    // Validation des données
$request->validate([
    'title' => 'required|string|max:255',
    'image_url' => 'required|url',
    'locker_url' => 'required|url',
    'size' => 'nullable|string|max:20',
    'devices' => 'nullable|string|max:50',
    'rating' => 'nullable|numeric|min:0|max:10',
    'locker_key' => 'nullable|string|max:255',
    'locker_it' => 'nullable|numeric',
    'locker_script_url' => 'nullable|url',
]);


    // Création du jeu en base
   Game::create($request->only([
    'title', 'image_url', 'size', 'devices', 'rating', 'locker_url', 'locker_key', 'locker_it', 'locker_script_url'
]));


    // Redirection vers la liste avec message succès
    return redirect()->route('admin.index')->with('success', 'Jeu ajouté avec succès.');
}
public function edit($id)
{
    $game = Game::findOrFail($id);
    return view('admin.edit', compact('game'));
}

public function update(Request $request, $id)
{
    $request->validate([
    'title' => 'required|string|max:255',
    'image_url' => 'required|url',
    'locker_url' => 'required|url',
    'size' => 'nullable|string|max:20',
    'devices' => 'nullable|string|max:50',
    'rating' => 'nullable|numeric|min:0|max:10',
    'locker_key' => 'nullable|string|max:255',
    'locker_it' => 'nullable|numeric',
    'locker_script_url' => 'nullable|url',
]);
    $game = Game::findOrFail($id);
    $game->update($request->only([
    'title', 'image_url', 'size', 'devices', 'rating', 'locker_url', 'locker_key', 'locker_it', 'locker_script_url'
]));


    return redirect()->route('admin.index')->with('success', 'Jeu modifié avec succès.');
}

public function destroy($id)
{
    $game = Game::findOrFail($id);
    $game->delete();

    return redirect()->route('admin.index')->with('success', 'Jeu supprimé avec succès.');
}
// Dans votre contrôleur admin (par exemple GameController.php)
public function addScreenshot(Request $request, Game $game)
{
    $request->validate(['image_url' => 'required|url']);
    $game->screenshots()->create(['image_url' => $request->image_url]);
    return back()->with('success', 'Capture ajoutée');
}

public function deleteScreenshot(Screenshot $screenshot)
{
    $screenshot->delete();
    return back()->with('success', 'Capture supprimée');
}

}
