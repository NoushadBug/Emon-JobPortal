<?php

namespace Database\Seeders;

use App\Models\Thana;
use Illuminate\Database\Seeder;

class ThanaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thana::create([
            'district_id' => 1,
            'thana_name' => 'Feni Sadar',
            'status' => 1,
        ]);
        Thana::create([
            'district_id' => 1,
            'thana_name' => 'Feni Dagonbhuiyan',
            'status' => 1,
        ]);
        Thana::create([
            'district_id' => 2,
            'thana_name' => 'Chattagram Sadar',
            'status' => 1,
        ]);
        Thana::create([
            'district_id' => 2,
            'thana_name' => 'Coxbazar',
            'status' => 1,
        ]);
    }
}
