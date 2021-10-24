<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'UserID';

    protected $fillable = [
        'BillingFirstName', 'BillingLastName', 'UserEmail','UserPassword','BillingMobile','RegisteredIP'
    ];
}
