<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tax_code;
use Illuminate\Support\Facades\DB;

class tax_codeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ans = DB::table('information')->get()->toArray();
        foreach($ans as $item){
            tax_code::factory(1)->create([
                'socmnd' => $item->socmnd,
            ]);
        }
    }
}
