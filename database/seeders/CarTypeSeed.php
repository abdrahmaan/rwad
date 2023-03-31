<?php

namespace Database\Seeders;
use App\Models\CarType;
use Illuminate\Database\Seeder;

class CarTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarType::create([
            "CarType" => "ميكروباص",
            "CarImg" => "defaultCar.jpg",
            "SollarType" => "بنزين",
            "Sollar"  => 25,
            "Zeet"  => 30,
            "FilterZ" => 20,
            "FilterH" => 74,
            "Sior" => 93,
            "Kawtsh" => 73,
            "Dbryag" => 83,
            "Framel" => 83,
           ]);
        CarType::create([
            "CarType" => "موتوسيكل",
            "CarImg" => "defaultCar.jpg",
            "SollarType" => "بنزين",
            "Sollar"  => 25,
            "Zeet"  => 20,
            "FilterZ" => 20,
            "FilterH" => 84,
            "Sior" => 93,
            "Kawtsh" => 63,
            "Dbryag" => 93,
            "Framel" => 40,
           ]);

    }
}
