<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = ['accompany_number', 'paid_price', 'room_number', 'client_id', 'receptionist_id'];

    /**
     * Get the receptionist that manages the reservation.
     */
    public function receptionist()
    {
        return $this->belongsTo(receptionist::class);
    }


    /**
     * Get the client that made the reservation.
     */
    public function client()
    {
        return $this->belongsTo(client::class);
    }


    /**
     * Get the room associated with the reservation.
     */
    public function room()
    {
        return $this->hasOne(room::class);
    }
}
