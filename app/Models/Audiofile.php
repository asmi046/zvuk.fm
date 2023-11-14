<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;

class Audiofile extends Model
{
    use HasFactory;
    use AsSource;

    protected $fillable = [
        'name',
        'file',
        'type',
        'price',
    ];
}
