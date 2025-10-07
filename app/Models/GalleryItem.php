<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'gallery_group_id',
        'title',
        'image_path',
        'is_active',
        'order',
    ];

    public function group()
    {
        return $this->belongsTo(GalleryGroup::class, 'gallery_group_id');
    }

     public function photoFile()
    {
        return $this->belongsTo(MediaFile::class, 'image_path');
    }

    public function getImageUrlAttribute()
    {
        return $this->photoFile ? asset('storage/' . $this->photoFile->file_path) : asset('assets/images/avatar-1.png');
    }

}
