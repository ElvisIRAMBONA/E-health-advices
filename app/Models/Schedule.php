<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    // Table associée
    protected $table = 'schedules';

    // Champs modifiables
    protected $fillable = ['doctor_id', 'day_of_week', 'start_time', 'end_time'];

    /**
     * Relation avec le médecin
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}