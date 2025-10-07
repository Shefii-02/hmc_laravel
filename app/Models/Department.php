<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'name', 'description', 'main_image', 'order', 'thumb_image', 'is_active'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function mainImage()
    {
        return $this->belongsTo(MediaFile::class, 'main_image');
    }
    public function thumbImage()
    {
        return $this->belongsTo(MediaFile::class, 'thumb_image');
    }

    public function getMainImageUrlAttribute()
    {
        return $this->mainImage && $this->mainImage->file_path
            ? asset('storage/' . $this->mainImage->file_path)
            : asset('images/default-department.jpg');
    }


    public function getThumbImageUrlAttribute()
    {
        return $this->thumbImage && $this->thumbImage->file_path
            ? asset('storage/' . $this->thumbImage->file_path)
            : asset('images/default-department.jpg');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
