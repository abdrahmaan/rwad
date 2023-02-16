<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarMovment extends Model
{
    use HasFactory;

    protected $table = "car_movments";
    protected $fillable = [
        "Tabashery",
        "PlateNumber",
        "CarType",
        "StartCounter",
        "EndCounter",
        "Diff",
        "BranchName",
        "op",
    ];  
}
