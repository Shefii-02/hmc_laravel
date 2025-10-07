<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'company_id','doctor_id','patient_id','appointment_time','status','notes','token_no',
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function patient() {
        return $this->belongsTo(Patient::class);
    }
}
