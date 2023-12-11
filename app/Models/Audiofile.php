<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Audiofile extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    protected $fillable = [
        'name',
        'file',
        'type',
        'price',
    ];

    protected $allowedSorts = [
        'name',
        'type',
    ];
}
