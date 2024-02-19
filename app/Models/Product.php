<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_products')->withPivot('price', 'quantity');
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_products');
    }
}
