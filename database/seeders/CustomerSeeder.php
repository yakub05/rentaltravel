<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'nama' => 'Annisa',
            'email' => 'annisa@gmail.com',
            'password' => Hash::make('12345678'),
            'telf' => '081359223028',
            'user_type' => 'customer',
        ]);
    }
}
