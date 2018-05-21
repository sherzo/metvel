<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'provider_id', 'payment_id',
        'status', 'subtotal', 'iva', 'total'
    ];

    public function provider()
    {
    	return $this->belongsTo(Provider::class);
    }

    public function payment()
    {
    	return $this->belongsTo(Payment::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('amount', 'quantity');
    }
}
