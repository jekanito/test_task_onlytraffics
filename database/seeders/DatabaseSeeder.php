<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => env('NAME_TELEGRAM_ADMIN'),
            'telegram_user_id' => env('ID_TELEGRAM_ADMIN'),
            'telegram_user_login' => env('LOGIN_TELEGRAM_ADMIN'),
            'active' => 1
        ]);
    }
}
