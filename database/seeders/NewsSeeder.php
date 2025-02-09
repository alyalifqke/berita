<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) { // Buat 50 data berita
            DB::table('news')->insert([
                'title' => $faker->sentence(6), // Judul berita acak
                'slug' => Str::slug($faker->sentence(7)), // Slug otomatis dari judul
                'content' => $faker->paragraphs(5, true), // Konten berita
                'category_id' => rand(1, 5), // Asumsikan kategori ada 1-5
                'image' => 'https://picsum.photos/600/400', // Gambar random
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
