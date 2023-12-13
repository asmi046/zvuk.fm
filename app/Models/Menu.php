<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Menu extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;


    protected $fillable = [
        'lnk',
        'order',
        'title',
    ];

    protected $allowedSorts = [
        'order',
    ];
}
