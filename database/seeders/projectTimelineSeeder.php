<?php

namespace Database\Seeders;

use App\Models\Departments;
use App\Models\TaskLogs;
use App\Models\Tasks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class projectTimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = \Faker\Factory::create();

        $departments = [
            ['code' => 'SP', 'name' => 'Spinning'],
            ['code' => 'RR', 'name' => 'Ring Rope'],
            ['code' => 'NT', 'name' => 'Netting'],
            ['code' => 'FN', 'name' => 'Finishing'],
            ['code' => 'UT', 'name' => 'Utility'],
        ];

        foreach ($departments as $dept) {
            Departments::updateOrCreate(['code' => $dept['code']], $dept);
        }

        $allDepartments = Departments::all();

        for ($i = 1; $i <= 100; $i++) {
            $department = $allDepartments->random();

            $task = Tasks::create([
                'code' => 'TASK-' . Str::upper(Str::random(6)),
                'name' => ucfirst($faker->words(3, true)),
                'department_id' => $department->id,
                'pic_name' => $faker->name(),
                'description' => $faker->paragraph(),
                'is_urgent' => $faker->boolean(20), 
                'status' => $faker->randomElement(['In Progress', 'Clear']),
            ]);

            $logCount = rand(1, 5);
            for ($j = 1; $j <= $logCount; $j++) {
                TaskLogs::create([
                    'task_id' => $task->id,
                    'log_date' => $faker->dateTimeBetween('-7 months', 'now')->format('Y-m-d'),
                    'description' => $faker->sentence(8),
                    'note' => $faker->optional()->sentence(6),
                    'image' => $faker->optional()->imageUrl(640, 480, 'technics'),
                ]);
            }
        }
    }
}
