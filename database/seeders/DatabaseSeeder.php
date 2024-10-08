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

        Question::factory(10)->create();
        Answer::factory(50)->recycle(Question::all())->create();
        $this->call([TagSeeder::class, UserSeeder::class]) ;
    }
}
