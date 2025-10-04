<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
public function definition()
{
    $employeeIds = Employee::pluck('id')->toArray();
    return [
        'employee_id' => $this->faker->randomElement($employeeIds),
        'date' => $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
        'status' => $this->faker->randomElement(['Có mặt','Nghỉ','Đi muộn','Vắng']),
        'check_in' => $this->faker->time('H:i', '08:00'),
        'check_out' => $this->faker->time('H:i', '17:00'),
        'note' => $this->faker->sentence(6),
    ];
}}
