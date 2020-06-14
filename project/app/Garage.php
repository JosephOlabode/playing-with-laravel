<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    protected $table = 'garages';

    protected $fillable = [
        'name',
        'costumer_level'
    ];
    public function bikes() {
        return $this->belongsToMany('App\Bike', 'bike_garage', 'bike_id', 'garage_id');
    }
}
