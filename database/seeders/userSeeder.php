<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        'name' => 'Admin User',
        'username' => 'admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('admin123')
    ]);
    }
}
