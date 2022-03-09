<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class receptionist extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'receptionists';
    protected $fillable = [
        'name',
        'email',
        'password',
        'national_id',
        'manager_id',
        'avatar_img',
    ];


    /**
     * Get the rooms for the blog post.
     */
    public function reservations()
    {
        return $this->hasMany(reservation::class);
    }

    public function manager()
    {
        return $this->belongsTo(manager::class);
    }
    protected $hidden = [
        'password',
    ];
}
