<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    public function run()
    {
        Game::insert([
            [
                'title' => 'Plants vs Zombies™ 2',
                'image_url' => 'https://example.com/zombies.jpg',
                'size' => '12.4.1',
                'devices' => 'Android',
                'rating' => 9.0,
                'locker_url' => 'https://your-locker-url.com/zombies',
            ],
            [
                'title' => 'Bomber Friends - Débloqué',
                'image_url' => 'https://example.com/bomber.jpg',
                'size' => '5.45',
                'devices' => 'Android,iOS',
                'rating' => 8.7,
                'locker_url' => 'https://your-locker-url.com/bomber',
            ],
            [
                'title' => 'Naruto: Ultimate Ninja Storm',
                'image_url' => 'https://example.com/naruto.jpg',
                'size' => '1.2.7',
                'devices' => 'Android',
                'rating' => 9.5,
                'locker_url' => 'https://your-locker-url.com/naruto',
            ],
        ]);
    }
}
