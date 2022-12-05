<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'level_id',
        'user_id',
        'id',
        'total_money_charge',
    ];
    use HasFactory;

    public function level(){
        return $this->belongsTo(Level::class);
    }

}
