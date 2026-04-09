<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
        'name' => 'Admin User',
        'username' => 'admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('admin123')
    ],
    [
                'name' => 'Regular User',
                'username' => 'user',
                'email' => 'user@example.com',
                'password' => bcrypt('user123'),
            ],
    );
    }
}
