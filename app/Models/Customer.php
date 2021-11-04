<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function resetToken($UserID)
    {
        return DB::table('password_reset_tokens')->where('UserID', '=', $UserID)->get()->first()->ResetToken;
    }
    public function activationLink($UserID)
    {
        return DB::table('account_activation_links')->where('UserID', '=', $UserID)->get()->first()->ActivationLink;
    }
}
