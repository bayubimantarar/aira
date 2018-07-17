<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    use Notifiable;
    
    protected $guard = 'pengguna';
    protected $table = 'pengguna';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'akses'
    ];
}
