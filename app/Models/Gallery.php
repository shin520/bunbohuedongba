<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    public function parent () {
        return $this->belongsTo(GalleryType::class,'parent_id');
    }
    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }
    public function images_index()
    {
        return $this->hasMany(GalleryImage::class, 'gallery_id')->orderBy('id', 'asc')->take(6);
    }
}
