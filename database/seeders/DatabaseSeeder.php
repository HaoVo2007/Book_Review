<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Database\Factories\ReviewFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Book::factory(35)->create()->each(function($book) {
            $numberReview = random_int(5, 30);
            Review::factory()->count($numberReview)->for($book)->create();
        });
    }
}
