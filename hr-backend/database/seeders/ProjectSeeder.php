<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Employee;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::factory()->count(5)->create();

        // Gán nhân viên ngẫu nhiên vào mỗi dự án
        foreach ($projects as $project) {
            $employees = Employee::inRandomOrder()->take(rand(3, 6))->pluck('id');
            $project->employees()->attach($employees, [
                'role' => 'Thành viên'
            ]);
        }
    }
}
