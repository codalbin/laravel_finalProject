<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tag::factory(3)->create() ;

        Tag::create([
            'name' => 'Python',
            'slug' => 'pytn',
            'color' => 'red'
        ]);

        Tag::create([
            'name' => 'Html',
            'slug' => 'html',
            'color' => 'blue'
        ]);

        Tag::create([
            'name' => 'Laravel',
            'slug' => 'lrvl',
            'color' => 'green'
        ]);
    }
}
