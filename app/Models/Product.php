<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'images', 'category_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productoptions()
    {
        return $this->hasMany(ProductOption::class);
    }

    public function productPrice()
    {
        return $this->hasMany(ProductPrice::class);
    }
}
