<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Diktor extends Model
{
    use HasFactory;
    use AsSource;

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

    protected $with = [
        "price_table"
    ];


    public function price_table()
    {
        return $this->hasMany(Price::class)->orderBy('start');
    }
}
