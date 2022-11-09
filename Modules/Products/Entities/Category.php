<?php

namespace Modules\Products\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'parent_id', 'is_active', 'created_at', 'updated_at', 'deleted_at'];


    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
