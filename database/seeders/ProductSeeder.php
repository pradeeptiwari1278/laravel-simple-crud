<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Download a random image from picsum.photos
        $imageUrl      = 'https://picsum.photos/200/200?random=' . uniqid();
        $imageContents = Http::get($imageUrl)->body();

        // Generate a unique filename
        $filename = 'products/' . Str::random(10) . '.jpg';

        // Save the image to storage/app/public/products
        Storage::disk('public')->put($filename, $imageContents);

        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'name'        => $faker->words(2, true),
                'description' => $faker->sentence(12),
                'price'       => $faker->numberBetween(100, 999),
                'image'       => $filename,
            ]);
        }
    }
}
