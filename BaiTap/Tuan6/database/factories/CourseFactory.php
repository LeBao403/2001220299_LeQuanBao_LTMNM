<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),  // 3 từ ngẫu nhiên cho tiêu đề
            'description' => $this->faker->sentence(),  // Câu mô tả ngắn
        ];
    }
}
