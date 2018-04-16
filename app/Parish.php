<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parish extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'municipality_id'
    ];


    public function municipality()
    {
    	return $this->belongsTo('municipality_id');
    }
}
