<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $fillable = [
        "PlayerName" ,
        "Age" ,
        "Address",
        "Phone1" ,
        "Phone2" ,
        "DateOfBirth",
        "Position" ,
        "Height" ,
        "Weight" ,
        "GroupName" ,
        "BranchName" ,
        "CategoryName" ,
        "Status" ,
        "VideoLink",
        "ImagePath",
        "TotalPhy",
        "TotalAdaKhaty",
        "TotalMahary",
        "TotalMentalState",
        "TotalBrainState"
    ];
};

