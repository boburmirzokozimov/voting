<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-cyan-500']);
        Status::factory()->create(['name' => 'In  Progress', 'classes' => 'bg-red-500']);
        Status::factory()->create(['name' => 'Implemented', 'classes' => 'bg-green-500']);
        Status::factory()->create(['name' => 'Closed', 'classes' => 'bg-gray-500']);
    }
}
