<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Book::query()->create([
                'title' => $faker->sentence(3),
                'author' => $faker->name,
                'year' => $faker->numberBetween(1990, 2023),
                'description' => $faker->paragraph,
                'available_copies' => $faker->numberBetween(0, 10),
            ]);
        }
    }
}
