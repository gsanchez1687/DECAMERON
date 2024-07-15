<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    use HasFactory;
    protected $table = 'statuses';

    public function hotels()
    {
        return $this->hasMany(Hotels::class);
    }

    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }
}
