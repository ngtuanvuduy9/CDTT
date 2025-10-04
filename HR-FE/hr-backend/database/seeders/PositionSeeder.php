<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        $positions = [
            ['title' => 'Nhân viên', 'description' => 'Nhân viên thực hiện công việc theo phân công'],
            ['title' => 'Trưởng phòng', 'description' => 'Quản lý, điều phối công việc phòng ban'],
            ['title' => 'Giám đốc', 'description' => 'Điều hành công ty'],
        ];

        foreach ($positions as $p) {
            Position::updateOrCreate(['title' => $p['title']], $p);
        }
    }
}
