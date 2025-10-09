<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    protected $fillable = [
        'company_id','patient_id','test_name','result_file','test_date','remarks'
    ];

    public function company() {
        return $this->belongsTo(Company::class);
    }

   public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function file()
    {
        return $this->belongsTo(MediaFile::class, 'result_file');
    }

     public function getFileUrlAttribute()
    {
        return $this->file ? asset('storage/' . $this->file->file_path) : asset('assets/images/avatar-1.png');
    }

}
