<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Game;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $feedbacks = [
            "This game is amazing, the graphics are stunning and the story is captivating.",
            "Smooth gameplay, but the levels feel a bit repetitive.",
            "I love the soundtrack, it perfectly matches the atmosphere.",
            "Encountered some bugs, but overall a very good game.",
            "The multiplayer mode is really fun and addictive.",
            "The difficulty is too high at the start, I gave up.",
            "Great value for money, highly recommend it.",
            "Controls are a bit tricky to master.",
            "Updates bring lots of interesting content regularly.",
            "Graphics feel outdated, but gameplay is solid.",
            "The storyline is predictable, which is a shame.",
            "Perfect game to relax after a long day.",
            "Enemy AI is too basic for my taste.",
            "Hours of fun guaranteed, I keep coming back!",
            "Progression system is unbalanced.",
            "The environments are beautiful and well-designed.",
            "Would be perfect with a co-op mode.",
            "Complete game with lots to discover.",
            "Character customization is great.",
            "A bit repetitive over time, but enjoyable.",
            "The tutorial is clear and helpful.",
            "The music could be better in my opinion.",
            "Super immersive experience, kudos to the devs.",
            "Loading times are too long.",
            "Side quests are interesting and varied.",
            "Recommended for genre fans.",
            "Online mode is often unstable.",
            "I really enjoyed the well-written story.",
            "Occasional crashes on my device.",
            "Wish there were more customization options.",
            "Very intuitive and easy to pick up.",
            "The pixel art graphics are charming.",
            "Perfect for playing with family.",
            "Dialogues are sometimes a bit flat.",
            "Looking forward to the sequel.",
            "Level design is excellent and well thought out.",
            "A nice surprise, didn’t expect that.",
            "Too many ads in the free version.",
            "The community is friendly and active.",
            "Good balance between action and strategy.",
            "Optimization could be improved.",
        ];

        $games = Game::all();

        if ($games->isEmpty()) {
            $this->command->error('No games found in the database. Please add some games before running this seeder.');
            return;
        }

        for ($i = 0; $i < 200; $i++) {
            Comment::create([
                'game_id' => $games->random()->id,
                'user_name' => 'User' . rand(1000, 9999),
                'content' => $feedbacks[array_rand($feedbacks)],
                'rating' => rand(1, 5),
            ]);
        }
    }
}
