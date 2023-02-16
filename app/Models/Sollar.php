<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sollar extends Model
{
    use HasFactory;

    protected $table = "sollars";

    protected $fillable = [
        "Tabashery",
        "PlateNumber",
        "CarType",
        "Counter",
        "Liter",
        "CostLiter",
        "Total",
        "BranchName",
        "op",
    ];
}
