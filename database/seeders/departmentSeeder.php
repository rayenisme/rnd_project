<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
                                            ['code' => 'SP', 'name' => 'Spinning'],
                                            ['code' => 'RR', 'name' => 'Ring Rope'],
                                            ['code' => 'NT', 'name' => 'Netting'],
                                            ['code' => 'FN', 'name' => 'Finishing'],
                                            ['code' => 'UT', 'name' => 'Utility'],
                                        ]);
    }
}
