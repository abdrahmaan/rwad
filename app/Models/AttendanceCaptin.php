<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceCaptin extends Model
{
    use HasFactory;

    protected $table = 'attendance_captin';

    protected $fillable = [
        'CaptinName',
        'GroupName',
        'BranchName',
    ];
}
