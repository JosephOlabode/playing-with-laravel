<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'type', 'name', 'company', 'bike_id'
    ];

    public function bike() {
        return $this->belongsTo('App\Bike');
    }
}
