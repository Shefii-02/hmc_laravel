<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['company_id', 'name', 'designation', 'message', 'photo', 'is_active', 'order'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function image()
    {
        return $this->belongsTo(MediaFile::class, 'photo');
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image->file_path) : asset('default-avatar.png');
    }
}
