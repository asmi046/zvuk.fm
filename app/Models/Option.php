<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Orchid\Screen\AsSource;
// use Orchid\Filters\Filterable;
// use Orchid\Filters\Types\Like;

class Option extends Model
{
    use HasFactory;
    // use AsSource;
    // use Filterable;

    protected $fillable = [
        'name',
        'title',
        'page',
        'value',
        'type',
    ];

    protected $allowedSorts = [
        'name',
        'type'
    ];

    protected $allowedFilters = [
        'name' => Like::class,
    ];
}
