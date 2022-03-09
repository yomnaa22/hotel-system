<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class client extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'clients';

    protected $fillable = ['name', 'email', 'mobile', 'password', 'country', 'gender', 'status'];

    protected $hidden = [
        'password',
    ];

    /**
     * Get the reservations of the client.
     */
    public function reservations()
    {
        return $this->hasMany(reservation::class);
    }
}
