<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GalleryGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'slug',
        'main_image',
        'is_active',
        'order',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($group) {
            $group->slug = Str::slug($group->title) . '-' . Str::random(5);
        });
    }

    public function items()
    {
        return $this->hasMany(GalleryItem::class);
    }

     public function imageFile()
    {
        return $this->belongsTo(MediaFile::class, 'main_image');
    }

    public function getMainImageUrlAttribute()
{
        return $this->imageFile ? asset('storage/' . $this->imageFile->file_path) : asset('assets/images/avatar-1.png');
    }


}
