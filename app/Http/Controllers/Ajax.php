<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;

class Ajax extends Controller
{
    public function get_address(Request $request)
    {
        $addressID = $request->input('addressid');
        $addresstype = $request->input('addresstype');
        if($addresstype == "billing")
        {
            return BillingAddress::findOrFail($addressID);
        }
        else if($addresstype == "delivery")
        {
            return DeliveryAddress::findOrFail($addressID);
        }
    }
}
