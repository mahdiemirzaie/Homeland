<?php

namespace Database\Seeders;

use App\Models\ActivationCode;
use Illuminate\Database\Seeder;

class ActivationCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ActivationCode::factory()->create();
    }
}
