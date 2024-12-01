<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Убедитесь, что вы импортировали модель User

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123')
        ]);
    }
}
