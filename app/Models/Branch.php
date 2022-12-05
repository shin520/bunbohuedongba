<?php

namespace App\Models;
use App\Models\BranchCategory1;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = ['parent_id','parent_child_id'];
    public function parent () {
        return $this->belongsTo(BranchCategory1::class,'parent_id');
    }
    public function parent_child () {
        return $this->belongsTo(BranchCategory2::class,'parent_child_id');
    }
    public function images()
    {
        return $this->hasMany(BranchImage::class);
    }
}
