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
        ]);
        Thana::create([
            'district_id' => 1,
            'thana_name' => 'Feni Dagonbhuiyan',
        ]);
        Thana::create([
            'district_id' => 2,
            'thana_name' => 'Chattagram Sadar',
        ]);
        Thana::create([
            'district_id' => 2,
            'thana_name' => 'Coxbazar',
        ]);
    }
}
