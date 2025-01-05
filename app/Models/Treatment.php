<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_patient_id','treatment'];

    public function doctorPatient()
    {
        return $this->belongsTo(DoctorPatient::class, 'doctor_patient_id');
    }
}
