<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchCategory2 extends Model
{
    use HasFactory;
    public function parent () {
        return $this->belongsTo(BranchCategory1::class,'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Branch::class,'parent_child_id');
    }
}