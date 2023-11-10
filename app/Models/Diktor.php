<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diktor extends Model
{
    use HasFactory;


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
