<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'department_id',
        'name',
        'designation',
        'specialization',
        'qualification',
        'order',
        'experience_years',
        'photo',
        'email',
        'phone',
        'bio',
        'is_active'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function doctor_department(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'doctor_departments', 'doctor_id', 'department_id');
    }

    public function getDepartmentsAttribute()
    {
        return $this->doctor_department? $this->doctor_department->pluck('name')->toArray() : [];
    }
    public function photoFile()
    {
        return $this->belongsTo(MediaFile::class, 'photo');
    }

    public function getPhotoUrlAttribute()
    {
        return $this->photoFile ? asset('storage/' . $this->photoFile->file_path) : asset('assets/images/avatar-1.png');
    }
}
