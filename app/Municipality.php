<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'state_id'
    ];


    public function state()
    {
    	return $this->belongsTo(State::class);
    }

    public function parishes()
    {
    	return $this->hasMany(Parish::class);
    }
}
