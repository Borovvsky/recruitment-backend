<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryNames = [
            'Literature', 'History', 'Science', 'Fantasy', 'Science fiction', 'Horror', 'Classic',
            'Criminal', 'Sensation', 'Thriller', 'Youth literature', 'Custom literature', 'Romance', 'Fiction', 'Historical novel',
        ];

        foreach ($categoryNames as $categoryName) {
            Category::query()->create([
                'name' => $categoryName,
            ]);
        }
    }
}
