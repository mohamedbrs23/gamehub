<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Screenshot;
use App\Models\Comment;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('game.show', compact('game'));
    }

    public function download($id)
    {
        $game = Game::findOrFail($id);

        // Option 1 : redirection immédiate vers final_url
        return redirect()->away($game->final_url);

        // Option 2 (sécurisé) : afficher une page finale avec bouton de téléchargement
        // return view('games.download', compact('game'));
    }
    public function addScreenshot(Request $request, $gameId)
{
    $request->validate([
        'image_url' => 'required|url'
    ]);

    $game = Game::findOrFail($gameId);

    $screenshot = new Screenshot();
    $screenshot->game_id = $game->id;
    $screenshot->image_url = $request->image_url;
    $screenshot->save();

    return redirect()->back()->with('success', 'Capture ajoutée avec succès.');
}
public function deleteScreenshot($screenshotId)
{
    $screenshot = Screenshot::findOrFail($screenshotId);
    $screenshot->delete();

    return redirect()->back()->with('success', 'Capture supprimée avec succès.');
}
public function storeComment(Request $request, $gameId)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'content' => 'required|string'
    ]);

    Comment::create([
        'game_id' => $gameId,
        'name' => $request->name,
        'email' => $request->email,
        'content' => $request->content
    ]);

    return redirect()->back()->with('success', 'Commentaire ajouté avec succès.');
}

}
