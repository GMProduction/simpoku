<?php

namespace App\Master;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class memberModel extends Authenticatable
{
    //
    use Notifiable;

    protected $table = 'tb_member';
    protected $guard = 'member';

    protected $fillable = [
        'username', 'email', 'password', 'firstname', 'lastname', 'address', 'phone', 'job', 'dateofbirth', 'email_verified_at', 'remember_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    
}
