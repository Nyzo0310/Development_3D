<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'username',
        'password',
    ];

    // Define the hidden attributes for serialization (e.g., when the model is converted to an array or JSON)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Add mutator to automatically hash passwords before saving to the database
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
