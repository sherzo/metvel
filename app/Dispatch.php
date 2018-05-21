<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
   	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'client_id', 'payment_id', 'shipping_id', 'city_id', 'address',
        'status', 'subtotal', 'iva', 'total'
    ];

    public function client()
    {
    	return $this->belongsTo(Client::class);
    }

    public function shipping()
    {
    	return $this->belongsTo(Shipping::class);
    }

    public function payment()
    {
    	return $this->belongsTo(Payment::class);
    }

    public function city()
    {
    	return $this->belongsTo(City::class);
    }

    public function getCityNameAttribute() 
    {
        return $this->city->name;
    }

    public function getStateNameAttribute()
    {
        return $this->city->state->name;
    }

    public function getLocationAttribute()
    {
        return $this->city_name . ' edo. ' . $this->state_name;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('amount', 'quantity');
    }
}
