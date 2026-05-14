<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Pelanggan pertama',
            'email' => 'customerpertama@yopmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'user',
        ]);
    }
}
