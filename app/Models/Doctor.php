<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialty_id',
    ];

    /**
     * Get the user associated with the doctor.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patients(){
        return $this->hasMany(DoctorPatient::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}
