<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Albin T',
            'username' => 'albint',
            'email' => 'alb@gmail.com',
            // 'image' => fake()->imageURL(),
            'image' => 'https://www.gravatar.com/avatar/' . md5(fake()->email()) . '?d=identicon',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Enzo J',
            'username' => 'enzoj',
            'email' => 'enz@gmail.com',
            'image' => 'https://www.gravatar.com/avatar/' . md5(fake()->email()) . '?d=identicon',
            'email_verified_at' => now(),
            'password' => Hash::make('password2'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Pierre M',
            'username' => 'pierrem',
            'email' => 'pierre@gmail.com',
            'image' => 'https://www.gravatar.com/avatar/' . md5(fake()->email()) . '?d=identicon',
            'email_verified_at' => now(),
            'password' => Hash::make('password3'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Marc D',
            'username' => 'marcd',
            'email' => 'marc@gmail.com',
            'image' => 'https://www.gravatar.com/avatar/' . md5(fake()->email()) . '?d=identicon',
            'email_verified_at' => now(),
            'password' => Hash::make('password4'),
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Julie S',
            'username' => 'julies',
            'email' => 'julie@gmail.com',
            'image' => 'https://www.gravatar.com/avatar/' . md5(fake()->email()) . '?d=identicon',
            'email_verified_at' => now(),
            'password' => Hash::make('password5'),
            'remember_token' => Str::random(10)
        ]);

        // User::factory(5)->create() ;
    }
}
