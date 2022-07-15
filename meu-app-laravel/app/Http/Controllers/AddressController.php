<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index() 
    {
        $addresses = Address::all();
        return view ('addresses.index', compact('addresses'));

    }
}
