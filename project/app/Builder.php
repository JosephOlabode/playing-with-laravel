<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Builder extends Model
{
    protected $table = 'builders';

    protected $fillable = [
        'name',
        'description',
        'location'
    ];

    public function bike() {
        return $this->hasOne('App\Bike');
    }
}
