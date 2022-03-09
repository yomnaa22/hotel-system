<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'number', 'capacity', 'price', 'manager_id', 'floor_id', 'status'
    ];

    /**
     * Get the floor that owns the room.
     */
    public function floor()
    {
        return $this->belongsTo(floor::class);
    }

    /**
     * Get the reservation that owns the room.
     */
    public function reservation()
    {
        return $this->belongsTo(reservation::class);
    }

    /**
     * Get the manager that created the room.
     */
    public function manager()
    {
        return $this->belongsTo(manager::class);
    }
}
