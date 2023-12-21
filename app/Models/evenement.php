<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'nom',
        'prix',
        'lieu',
        'jourDebut',
        'moisDebut',
        'jourFin',
        'moisFin',
        'heuresDebut',
        'minutesDebut',
        'heuresFin',
        'minutesFin',
        'Devise',
    ];
}
