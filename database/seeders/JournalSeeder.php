<?php

namespace Database\Seeders;

use App\Models\Departments;
use App\Models\TaskLogs;
use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class JournalSeeder extends Seeder
{
    public function run(): void
    {
        $fixedDate = Carbon::create(2026, 4, 15, 0, 0, 0);

        $data = [
            [
                'code' => 'FN-05-2026-001',
                'subject' => 'Koastu Ashida Besa',
                'status' => 'In Progress',
                'dept' => 'Finishing',
                'pic' => 'Pak Yadi',
                'description' => '',
            ],
            [
                'code' => 'NT-05-2026-001',
                'subject' => 'Follow Up PR Netting',
                'status' => 'In Progress',
                'dept' => 'Netting',
                'pic' => 'Azhar',
                'description' => '',
            ],
        ];

        foreach ($data as $item) {

            $department = Departments::where('name', $item['dept'])->first();

            if (!$department) {
                continue;
            }

            Tasks::create([
                'code' => $item['code'],
                'name' => $item['subject'],
                'department_id' => $department->id,
                'pic_name' => $item['pic'],
                'description' => $item['description'],
                'is_urgent' => false,
                'status' => $item['status'],
                'created_at' => $fixedDate,
                'updated_at' => $fixedDate,
            ]);
        }
    }
}
