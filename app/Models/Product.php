<?php

namespace App\Models;
use App\Models\ProductCategory1;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    use HasFactory;
    protected $fillable = ['parent_id','parent_child_id'];
    public function parent () {
        return $this->belongsTo(ProductCategory1::class,'parent_id');
    }
    public function parent_child () {
        return $this->belongsTo(ProductCategory2::class,'parent_child_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
