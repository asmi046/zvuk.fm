<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;

class Price extends Model
{
    use HasFactory;
    use AsSource;

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
