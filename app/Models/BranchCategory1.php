<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchCategory1 extends Model
{
    use HasFactory;


    public function children()
    {
        return $this->hasMany(BranchCategory2::class,'parent_id');
    }

    public function branch()
    {
        return $this->hasMany(Branch::class,'parent_id');
    }

    public function branch_index()
    {
        return $this->hasMany(Branch::class,'parent_id')->orderBy('id', 'asc')->where('hideshow', true)->take(6);
    }
}
