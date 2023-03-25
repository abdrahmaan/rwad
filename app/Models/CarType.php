<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    use HasFactory;
    protected $table = "car_type";

    protected $fillable = [
        "CarType",
        "CarImg",
        "SollarType",
        "Sollar" ,
        "Zeet" ,
        "FilterZ" ,
        "FilterH" ,
        "Sior" ,
        "Kawtsh" ,
        "Dbryag" ,
        "Framel" 
    ];
}
