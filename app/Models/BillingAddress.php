<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
    protected $fillable = ['UserID','BillingTitle','BillingFirstName','BillingLastName','BillingCompanyName','BillingMobile','BillingEmail','BillingAddress1',
        'BillingAddress2','BillingTownCity','BillingCountyState','BillingPostCode','BillingCountry'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
