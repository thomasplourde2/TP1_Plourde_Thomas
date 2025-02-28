<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Critic;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->has(Critic::factory(30))->create();
        $this->call([
            LanguageSeeder::class,
            FilmSeeder::class,
            ActorSeeder::class,
            ActorFilmSeeder::class
        ]);
    }
}
