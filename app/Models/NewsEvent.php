<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'slug',
        'description',
        'image',
        'published_at',
        'order',
        'status'
    ];

    // Relation with MediaHelper / media_files
    public function imageFile()
    {
        return $this->belongsTo(MediaFile::class, 'image');
    }

    public function getImageUrlAttribute()
    {
        return $this->imageFile ? asset('storage/' . $this->imageFile->file_path) : null;
    }
}
