<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'diktor_id',
        'start',
        'finish',
        'cost',
        'system_cost',
        'sample_cost',
        'ivr_cost',
        'dop_cost',
    ];
}
