<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function user_exp()
    {
        return $this->hasManyThrough(User::class, UserExp::class); // liên kết với bản user qua bảng trung gian là User_exp
    }
}
