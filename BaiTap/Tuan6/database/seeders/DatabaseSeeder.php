<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Category::factory()
            ->count(5)
            ->hasProducts(10)  // Cần chắc chắn đã định nghĩa quan hệ products() trong model Category
            ->create();

        // User::factory(10)->create();  // Có thể bật nếu muốn tạo nhiều user ngẫu nhiên

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(StudentCourseSeeder::class);
    }
}
