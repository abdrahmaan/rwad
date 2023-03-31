<?php

namespace Database\Seeders;
use App\Models\Car;
use Illuminate\Database\Seeder;

class Cars extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Car::create([
            "Tabashery" => 56,
            "PlateNumber" => "أ ل ف - 666",
            "CarType" => "ميكروباص",
            "SCounter" => 602700,
            "BranchName" => "القاهرة",
            "ShasehNumber" => "7972982JSKIS788",
            "DateExpire" => "26-06-2023",
            "NextSollar" => 602700 + 100,
            "NextZet" => 602700 + 100,
            "NextFilterH" =>  602700 + 100,
            "NextFilterZ" =>  602700 + 100,
            "NextFramel" =>  602700 + 100,
            "NextDbryag" => 602700  + 100,
            "NextKawtsh" =>  602700 + 100,
            "NextSior" =>  602700 + 100,
            "CarImg"=> "defaultCar.jpg"
        ]);

    }
}
