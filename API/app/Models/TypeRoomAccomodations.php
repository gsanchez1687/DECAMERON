<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRoomAccomodations extends Model
{
    use HasFactory;
    protected $table = 'type_room_accomodations';
    protected $fillable = [
        'hotel_id',
        'type_room_id',
        'accommodation_id',
        'created_at',
        'updated_at'
    ];
}
