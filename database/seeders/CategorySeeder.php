<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiksi'],
            ['name' => 'Non-Fiksi'],
            ['name' => 'Sains & Teknologi'],
            ['name' => 'Bisnis & Ekonomi'],
            ['name' => 'Self-Help'],
            ['name' => 'Sejarah'],
            ['name' => 'Agama & Spiritualitas'],
            ['name' => 'Kesehatan'],
            ['name' => 'Pendidikan'],
            ['name' => 'Anak & Remaja'],
            ['name' => 'Komik & Manga'],
            ['name' => 'Biografi & Memoar'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                ...$category,
                'created_by' => 'System',
                'created_at' => now(),
            ]);
        }
    }
}
