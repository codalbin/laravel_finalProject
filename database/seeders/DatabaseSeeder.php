<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Answer;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Tag;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([TagSeeder::class, UserSeeder::class]) ;
        Question::factory(count: 35)->recycle([
            User::all(),
            Tag::all()
        ])->create();
        Answer::factory(50)->recycle([Question::all(), User::all()])->create();
    }
}
