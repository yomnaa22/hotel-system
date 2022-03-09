<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class admin extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $table = 'admins';
    protected $fillable = [
        'email', 'name', 'password', 'national_id', 'avatar_img',
    ];

    protected $hidden = [
        'password',
    ];
}
