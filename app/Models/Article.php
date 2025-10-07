<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'slug',
        'content',
        'image',
        'order',
        'status'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function imageFile()
    {
        return $this->belongsTo(MediaFile::class, 'image');
    }

    public function getImageUrlAttribute()
    {
        return $this->imageFile ? asset('storage/' . $this->imageFile->file_path) : null;
    }
}
