<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Game;

class CommentFactory extends Factory
{
    protected $model = \App\Models\Comment::class;

    public function definition()
    {
        // Récupérer un id de jeu aléatoire (assure-toi d'avoir des jeux en BDD)
        $gameId = Game::inRandomOrder()->first()->id ?? 1;

        return [
            'game_id' => $gameId,
            'user_name' => $this->faker->name(),
            'content' => $this->faker->paragraph(2), // 2 phrases
            'rating' => $this->faker->numberBetween(1, 5),
        ];
    }
}
