<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    // protected $fillable = ['phone','rkey','imei','secure_id','setupkey','ohash','pwd','token','status'];
    // public $timestamps = false;
    use HasFactory;

    public function product () {
        return $this->belongsTo(Product::class,'product_id');
    }
}
