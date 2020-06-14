<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = [
        'make', 'model', 'year', 'mods',
        'picture'
    ];
    public function builder() {
        return $this->belongsTo('App\Builder');
    }

    public function items() {
        return $this->hasMany('App\Item');
    }

    public function garages() {
        return $this->belongsToMany('App\Garage');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function ratings() {
        return $this->hasMany('App\Rating');
    }


}
