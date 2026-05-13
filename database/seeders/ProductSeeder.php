<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $books = [
            ['category_id' => 1, 'name' => 'Pulang', 'description' => 'Novel drama keluarga penuh makna.', 'price' => 92000, 'stock' => 18],
            ['category_id' => 1, 'name' => 'Hujan', 'description' => 'Novel sci-fi romantis karya Tere Liye.', 'price' => 87000, 'stock' => 22],
            ['category_id' => 1, 'name' => 'Dilan 1990', 'description' => 'Kisah cinta remaja legendaris.', 'price' => 78000, 'stock' => 30],

            // 2. Non-Fiksi
            ['category_id' => 2, 'name' => 'Atomic Habits', 'description' => 'Panduan membangun kebiasaan baik.', 'price' => 120000, 'stock' => 25],
            ['category_id' => 2, 'name' => 'Sebuah Seni untuk Bersikap Bodo Amat', 'description' => 'Self awareness modern.', 'price' => 110000, 'stock' => 20],
            ['category_id' => 2, 'name' => 'Filosofi Teras', 'description' => 'Filsafat stoikisme untuk hidup modern.', 'price' => 98000, 'stock' => 17],
            ['category_id' => 2, 'name' => 'Rich Dad Poor Dad', 'description' => 'Pendidikan finansial populer.', 'price' => 125000, 'stock' => 14],
            ['category_id' => 2, 'name' => 'Think and Grow Rich', 'description' => 'Motivasi sukses dan mindset.', 'price' => 105000, 'stock' => 16],
        ];

        $additionalBooks = [
            1 => ['Senja di Ufuk Timur', 'Jejak Hujan', 'Rahasia Kota Tua', 'Langit dan Luka', 'Matahari Senja'],
            2 => ['Mindset Positif', 'Cara Berpikir Kritis', 'Belajar Minimalis', 'Kekuatan Fokus', 'Strategi Produktif'],
            3 => ['Dasar Pemrograman', 'AI untuk Pemula', 'Belajar Python', 'Teknologi Masa Depan', 'Robotika Modern'],
            4 => ['Manajemen Bisnis', 'Strategi Marketing', 'Dasar Investasi', 'Ekonomi Digital', 'Leadership Modern'],
            5 => ['Bangun Kebiasaan Hebat', 'Self Healing', 'Menjadi Produktif', 'Seni Mengatur Waktu', 'Mental Tangguh'],
            6 => ['Sejarah Nusantara', 'Perang Dunia II', 'Kerajaan Majapahit', 'Tokoh Revolusi Dunia', 'Napak Tilas Indonesia'],
            7 => ['Makna Kehidupan', 'Jalan Spiritual', 'Meditasi Modern', 'Belajar Ikhlas', 'Renungan Malam'],
            8 => ['Pola Hidup Sehat', 'Panduan Diet', 'Olahraga untuk Semua', 'Kesehatan Mental', 'Tubuh yang Bugar'],
            9 => ['Metode Belajar Cepat', 'Psikologi Pendidikan', 'Belajar Efektif', 'Pendidikan Karakter', 'Guru Inspiratif'],
            10 => ['Petualangan Si Kancil', 'Dunia Fantasi Anak', 'Cerita Sebelum Tidur', 'Remaja Hebat', 'Komik Edukasi Anak'],
            11 => ['Ninja Academy', 'Legenda Samurai', 'Dunia Superhero', 'Petualangan Manga', 'Komik Fantasi'],
            12 => ['Biografi Einstein', 'Kisah Steve Jobs', 'Memoar Seorang Guru', 'Perjalanan Nelson Mandela', 'Hidup Soekarno'],
        ];

        foreach ($additionalBooks as $categoryId => $titles) {
            for ($i = 1; $i <= 8; $i++) {
                foreach ($titles as $title) {
                    if (count($books) >= 100) {
                        break 2;
                    }

                    $books[] = [
                        'category_id' => $categoryId,
                        'name' => $title.' Vol. '.$i,
                        'description' => 'Buku '.strtolower($title).' dengan pembahasan menarik dan informatif.',
                        'price' => rand(50000, 150000),
                        'stock' => rand(5, 50),
                    ];
                }
            }
        }

        $finalBooks = [];

        foreach ($books as $book) {
            $finalBooks[] = [
                'category_id' => $book['category_id'],
                'name' => $book['name'],
                'description' => $book['description'],
                'price' => $book['price'],
                'stock' => $book['stock'],
                'created_at' => now(),
                'created_by' => 'System',
            ];
        }

        DB::table('products')->insert($finalBooks);

    }
}
