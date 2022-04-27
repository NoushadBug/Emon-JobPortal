<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        District::create([
            'district_name' => 'Feni',
            'status' => 1,
        ]);
        District::create([
            'district_name' => 'Chattagram',
            'status' => 1,
        ]);
    }
}
