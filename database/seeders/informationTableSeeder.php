<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Information;

class informationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::factory(1000)->create();
    }
}

