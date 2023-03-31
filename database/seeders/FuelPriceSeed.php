<?php

namespace Database\Seeders;

use App\Models\FuelPrice;
use Illuminate\Database\Seeder;

class FuelPriceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuelPrice::create([
            "Name"=>"سولار",
            "Value"=>"5",
        ]);

        FuelPrice::create([
            "Name"=>"بنزين 92",
            "Value"=>"7",
        ]);

        FuelPrice::create([
            "Name"=>"بنزين 95",
            "Value"=>"10",
        ]);
    }
}
