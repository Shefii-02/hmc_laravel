<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Banner extends Model
{
    use HasFactory;


    protected $fillable = [
        'company_id',
        'title',
        'subtitle',
        'image_id',
        'link',
        'order',
        'is_active',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function image()
    {
        return $this->belongsTo(MediaFile::class, 'image_id');
    }

    public function getImageUrlAttribute()
    {
        return $this->image && $this->image->file_path
            ? asset('storage/' . $this->image->file_path)
            : null;
    }
}
