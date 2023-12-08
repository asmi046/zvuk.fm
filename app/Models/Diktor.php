<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

class Diktor extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;


    protected $fillable = [
        'name',
        'order',
        'description',
        'irv',
        'img',
        'file',
        'file_irv',
        'gender',
    ];

    protected $allowedSorts = [
        'name',
        'order',
    ];

    protected $with = [
        "price_table"
    ];


    public function price_table()
    {
        return $this->hasMany(Price::class)->orderBy('start');
    }
}
