<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'latest');

        $query = Game::query();

        switch ($sort) {
            case 'rating':
                $query->orderByDesc('rating');
                break;
            case 'size':
                $query->orderBy('size');
                break;
            default:
                $query->orderByDesc('created_at');
        }

        $games = $query->get(); // pas de pagination
        $featuredGame = Game::latest()->first();

        return view('home', compact('games', 'featuredGame', 'sort'));
    }
}
