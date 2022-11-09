<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'category_id',
        'name',
        'description',
        'tags',
        'picture'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
