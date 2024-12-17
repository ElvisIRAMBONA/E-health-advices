<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    
    // Table associée
    protected $table = 'doctors';

    // Champs modifiables
    protected $fillable = ['name', 'specialization', 'location', 'contact','image_url'];

    /**
     * Relation avec les rendez-vous
     */

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Relation avec les horaires
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}