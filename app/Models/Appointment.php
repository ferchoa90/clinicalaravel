<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    use HasFactory;

    public $table = 'appointments';

    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class, 'id','patient_id');
    }

    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'id','doctor_id');
    }
}
