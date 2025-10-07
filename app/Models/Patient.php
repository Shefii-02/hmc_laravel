<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'company_id', 'full_name', 'email',
        'phone', 'dob', 'gender', 'address',
    ];



    public function company() {
        return $this->belongsTo(Company::class);
    }
     public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function labResults()
    {
        return $this->hasMany(LabResult::class);
    }
}
