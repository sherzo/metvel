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
}
