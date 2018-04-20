<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'dni', 'name', 'phone', 'address', 'city_id',
    ];

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getCityNameAttribute() 
    {
        return $this->city->name;
    }

    public function parish()
    {
        return $this->belongsTo(Parish::class);
    }

    public function getParishNameAttribute()
    {
        return $this->parish->name;
    }

    public function getStateNameAttribute()
    {
        return $this->city->state->name;
    }

    public function getLocationAttribute()
    {
        return $this->city_name . ' edo. ' . $this->state_name;
    }
}
