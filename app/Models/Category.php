<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function MainCategory(){
        return $this->belongsToMany(Category::class, 'category_sub_categories', 'category_id', 'sub_category_id');
    }
    public function SubCategory(){
        return $this->belongsToMany(Category::class, 'category_sub_categories','sub_category_id' , 'category_id');
    }

    public function Meals(){
        return $this->belongsToMany(Product::class, 'category_products');
    }
}
