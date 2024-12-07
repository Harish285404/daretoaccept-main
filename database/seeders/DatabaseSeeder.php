<?php

namespace Database\Seeders;

use App\Models\Interest;
use Database\Factories\InterestFactory;
use App\Models\Preference;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        InterestFactory::factory(10)->create();
        // Preference::factory(10)->create();

        // Interest::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
