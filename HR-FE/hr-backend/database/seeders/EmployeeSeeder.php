<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        // Tạo phòng ban và vị trí mẫu
        $dept = Department::firstOrCreate(['name' => 'Phòng Kinh Doanh']);
        $pos = Position::firstOrCreate(['title' => 'Nhân viên bán hàng']);

        for ($i = 1; $i <= 10; $i++) {
            Employee::create([
                'employee_code' => 'NV' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'fullname' => fake()->name(),
                'cccd' => fake()->numerify('############'),
                'dob' => fake()->date('Y-m-d', '2000-01-01'),
                'gender' => fake()->randomElement(['Nam', 'Nữ']),
                'education_level' => fake()->randomElement(['Cao đẳng', 'Đại học', 'Thạc sĩ']),
                'email' => fake()->unique()->safeEmail(),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'department_id' => $dept->id,
                'position_id' => $pos->id,
                'hired_date' => fake()->date(),
                'salary' => fake()->numberBetween(5000000, 20000000),
                'photo' => null,
            ]);
        }
    }
}
