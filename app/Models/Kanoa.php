<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanoa extends Model
{
    use HasFactory;
    protected $fillable = [
        'Email',
        'Prenom',
        'Nom',
        'Naissance',
        'password',
        'password_confirmation',
        'accept_term',
        'nombre',
        'photo',
        'image',
        'nom',
        'dates',
        'horaires',
        'message',
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
        'lieu'
    ];

/*    use AuthenticatableTrait;
 public function getAuthIdentifierName()
{
    return 'id'; // Le nom de la colonne qui sert d'identifiant
}

public function getAuthIdentifier()
{
    return $this->getKey(); // La valeur de l'identifiant, généralement l'ID
}

public function getAuthPassword()
{
    return $this->password; // Le nom de la colonne du mot de passe
}
public function getEmailForVerification()
{
    return $this->email;
}
public function hasVerifiedEmail()
{
    return $this->email_verified_at !== null;
}

public function markEmailAsVerified()
{
    $this->forceFill([
        'email_verified_at' => $this->freshTimestamp(),
    ])->save();
}

public function sendEmailVerificationNotification()
{
    $this->notify(new VerifyEmail);
}*/

}
