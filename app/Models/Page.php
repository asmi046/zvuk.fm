<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;

use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;


    protected $fillable = [
        'title',
        'slug',
        'img',
        'description',
        'seo_title',
        'seo_description',
    ];

    protected $allowedSorts = [
        'title',
    ];

    public function setSlugAttribute($value)
    {
        if (empty($value))
            $this->attributes['slug'] =  Str::slug($this->title);
        else
            $this->attributes['slug'] =  $value;
    }

}
