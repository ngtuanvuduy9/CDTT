<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'Phòng Nhân Sự', 'description' => 'Tuyển dụng, đào tạo, quản lý hồ sơ nhân sự'],
            ['name' => 'Phòng Kế Toán', 'description' => 'Quản lý tài chính, lương, chi tiêu'],
            ['name' => 'Phòng Kỹ Thuật', 'description' => 'Phát triển sản phẩm, vận hành hệ thống'],
        ];

        foreach ($departments as $d) {
            Department::updateOrCreate(['name' => $d['name']], $d);
        }
    }
}
