<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'state_id', 'iso_3166-2'
    ];


    public function cities()
    {
    	return $this->hasMany(City::class);
    }

    public function municipalities()
    {
    	return $this->hasMany(Municipality::class);
    }
}
