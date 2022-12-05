<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory2 extends Model
{
    use HasFactory;
    public function parent () {
        return $this->belongsTo(ProductCategory1::class,'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Product::class,'parent_child_id');
    }
}
