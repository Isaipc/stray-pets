<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Age;

class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Age::create(['name' => 'CACHORRO']);
        Age::create(['name' => 'JOVEN']);
        Age::create(['name' => 'ADULTO']);
        Age::create(['name' => 'VETERANO']);
    }
}
