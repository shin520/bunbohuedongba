<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryLogin extends Model
{
    protected $fillable =['id_user','ip','device','browser'];
    use HasFactory;
}
