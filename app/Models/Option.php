<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function productOptions()
    {
        return $this->hasMany(ProductOption::class);
    }
    
    public function optionValue()
    {
        return $this->hasMany(OptionValue::class);
    }
}
