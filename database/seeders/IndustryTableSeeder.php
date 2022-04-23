<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Industry::create([
            'industry_name' => 'Agrobase Insutry',
            'status' => 1,
        ]);
        Industry::create([
            'industry_name' => 'Airline/Travel/Tourism',
            'status' => 1,
        ]);
        Industry::create([
            'industry_name' => 'Architecture',
            'status' => 1,
        ]);
    }
}
