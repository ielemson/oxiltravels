<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;

class Customer extends BaseController
{
    public function index()
    {
        return view('pages/customer/welcome');
    }
}
