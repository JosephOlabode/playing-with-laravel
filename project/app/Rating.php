<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'bike_id',
        'user_id',
        'rating'
    ];

    public function bike() {
        return $this->belongsTo('App\Bike');
    }
}
