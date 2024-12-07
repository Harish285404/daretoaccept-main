<?php

namespace Database\Seeders;
use App\Models\Interest;
use App\Models\Preference;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Interest::factory(10)->create();
        Preference::factory(10)->create();

        // Interest::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
