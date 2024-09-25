<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'https://salt.tikicdn.com/cache/750x750/ts/product/47/5b/2f/2cbf5698accf879dafa48932cbb58b70.png.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/20/15/db/3c50fc06da7b72d97358842f9b08cd71.jpg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/fa/ce/51/5ba12f66d8f024578d4ad81565b809b9.jpg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/dd/49/7f/ab94b8b2e35c49fc38b063fae4e8266a.jpg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/8a/b6/ba/1d95b88597f28e42d8ca91e3b3ff600f.jpg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/87/08/0e/db4f09b6ee8bc317f097ebcca1933a2d.png.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/48/ec/9b/6830c5933e45efaf49b06cda80f0e860.jpeg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/7f/28/36/cd5411def3f0c47370bee2aad0213eb5.jpeg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/0f/f9/70/e273b6980de4f6f550329aafe91578d8.jpg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/b8/41/3c/30ea9e85a0944d7d548b330420333506.jpg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/e7/49/04/f148d28c1652086d0b7897048aed4c0c.png.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/d3/39/62/23a9e7eb304e658c05f6baa96ce98838.jpg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/d0/ca/fc/0d2576856e841faf8180880cdc01c481.jpg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/87/08/0e/db4f09b6ee8bc317f097ebcca1933a2d.png.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/94/fc/01/dd9fbd8ec614f4b858e3270c08811601.jpg.webp',
            'https://salt.tikicdn.com/cache/750x750/ts/product/ec/57/34/14da5cf8ff39f9fb4d0f57707cbaa68e.jpg.webp'
        ];

        return [
            'title' => fake()->sentence(3),
            'author' => fake()->name,
            'description' => fake()->paragraph,
            'image' => fake()->randomElement($images), 
            'created_at' => fake()->dateTimeBetween('-2 years'),
            'updated_at' => fake()->dateTimeBetween('created_at', 'now'),
        ];
    }
}
