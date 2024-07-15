<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Countries;
use App\Models\State;
use App\Models\Cities;
use App\Models\Statuses;
use App\Models\Rooms;

class Hotels extends Model
{
    use HasFactory;
    protected $table = 'hotels';
    protected $fillable = [
        'user_id',
        'name',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'zip_code',
        'phone',
        'email',
        'website',
        'maximum_rooms',
        'image',
        'description',
        'status_id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Countries::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(Cities::class);
    }

    public function status()
    {
        return $this->belongsTo(Statuses::class);
    }

    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }

}
