<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_date' => $this->faker->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+6 month')->format('Y-m-d'),
            'status' => $this->faker->randomElement(['Chưa bắt đầu', 'Đang thực hiện', 'Hoàn thành']),
            'budget' => $this->faker->randomFloat(2, 10000, 1000000),
        ];
    }
}
