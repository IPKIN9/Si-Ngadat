<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;
    protected $table = "users";
    protected $fillable = [
        'id',
        'nama',
        'username',
        'password',
        'role',
        'created_at',
        'updated_at',
    ];
}
