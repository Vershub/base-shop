<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $fillable = [
        'category_id',
        'locale_code',
        'name',
        'description',
        'meta_title',
        'meta_description',
    ];
}
