<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactorry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorPatient extends Model
{
    use HasFactory;
    protected $table = 'doctor_patients';
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'visit_type',
        'time',
        'date',
        'status',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
    public function treatment()
    {
        return $this->hasOne(Treatment::class, 'doctor_patient_id');
    }
}
