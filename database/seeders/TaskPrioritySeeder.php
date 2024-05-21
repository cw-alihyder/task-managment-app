<?php

namespace Database\Seeders;

use App\Models\TaskPriority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taskPriorities = [
            [
                'name' => 'High',
                'color' => '#a723b5'
            ],
            [
                'name' => 'Medium',
                'color' => '#e72aa3'
            ],
            [
                'name' => 'Low',
                'color' => '#031572'
            ]
        ];

        foreach ($taskPriorities as $key => $taskPriority) {

            TaskPriority::firstOrCreate($taskPriority);

        }
    }
}
