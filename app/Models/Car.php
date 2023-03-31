<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        "Tabashery",
        "PlateNumber",
        "CarType",
        "ShasehNumber",
        "DateExpire",
        "SCounter",
        "BranchName",
        "NextSollar",
        "NextZet",
        "NextFilterH",
        "NextFilterZ",
        "NextFramel",
        "NextDbryag",
        "NextKawtsh",
        "NextSior",
        "CarImg",
    ];
}
