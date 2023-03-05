<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'restaurant_id', 'date', 'time', 'number'];

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
}
