<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create(['name' => 'Category One']);
        Category::factory()->create(['name' => 'Category Two']);
        Category::factory()->create(['name' => 'Category Three']);
    }
}
