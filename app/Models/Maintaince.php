<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintaince extends Model
{
    use HasFactory;

   protected $table = "maintainces";

    protected $fillable = [
        "Tabashery",
        "PlateNumber",
        "CarType",
        "Counter",
        "Desc",
        "CategName",
        "GroupName",
        "BranchName",
        "Count",
        "op",
    ];
}
