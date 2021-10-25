<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'UserID';

    protected $fillable = [
        'BillingFirstName', 'BillingLastName', 'UserEmail','UserPassword','BillingMobile','RegisteredIP'
    ];

    public function billingAddresses()
    {
        return $this->hasMany(BillingAddress::class,$this->primaryKey);
    }
    public function deliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::class,$this->primaryKey);
    }
}
