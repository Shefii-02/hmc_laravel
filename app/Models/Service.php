<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'title', 'thumbnail', 'description', 'main_image', 'order', 'is_active'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function thumbnailMedia()
    {
        return $this->belongsTo(MediaFile::class, 'thumbnail');
    }

    public function mainImageMedia()
    {
        return $this->belongsTo(MediaFile::class, 'main_image');
    }

    public function getThumbnailUrlAttribute()
    {

        return $this->thumbnailMedia ? asset('storage/' . $this->thumbnailMedia->file_path) : null;
    }

    public function getMainImageUrlAttribute()
    {
        return $this->mainImageMedia ? asset('storage/' . $this->mainImageMedia->file_path) : null;
    }
}
