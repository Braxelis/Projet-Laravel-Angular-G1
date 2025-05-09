<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Personnel extends Authenticatable
{

    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'id_pers',
        'nom',
        'prenom',
        'sexe',
        'email',
        'tel',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
