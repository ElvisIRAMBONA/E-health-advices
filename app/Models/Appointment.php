<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    // Table associée
    protected $table = 'appointments';

    // Champs modifiables
    protected $fillable = ['user_id', 'doctor_id', 'appointment_date', 'status'];

      public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}