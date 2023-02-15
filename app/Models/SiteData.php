<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteData extends Model
{
    use HasFactory;

    protected $table = 'site_datas';

    protected $fillable = [
        'Name',
        'Value'
    ];
}
