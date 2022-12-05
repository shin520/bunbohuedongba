<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory1 extends Model
{
    use HasFactory;


    public function children()
    {
        return $this->hasMany(ProductCategory2::class,'parent_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class,'parent_id');
    }

    public function product_index()
    {
        return $this->hasMany(Product::class,'parent_id')->orderBy('id', 'asc')->where('hideshow', true);
    }
}
