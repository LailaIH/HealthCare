<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'documents',
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'documents' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }    

    public function doctors(){
        return $this->hasMany(DoctorPatient::class);
    }

}
