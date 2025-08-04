<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            GameSeeder::class,
            CommentSeeder::class,  // <-- ajoute cette ligne ici
        ]);
    }
}
