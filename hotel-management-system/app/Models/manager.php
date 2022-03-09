<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class manager extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'managers';
    protected $fillable = [
        'email', 'name', 'password', 'national_id', 'avatar_img',
    ];
    public function receptionists()
    {
        return $this->hasMany(receptionist::class);
    }

    public function floors()
    {
        return $this->hasMany(floor::class);
    }

    protected $hidden = [
        'password',
    ];
    
}
