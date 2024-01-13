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
        return $this->belongsToMany(Item::class, 'item_products')->withPivot('quantity');
    }

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
