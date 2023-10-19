<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = Book::all();
        $categories = Category::all();

        foreach ($books as $book) {
            $randomCategories = $categories->random(2);
            $book->categories()->attach($randomCategories);
        }
    }
}
