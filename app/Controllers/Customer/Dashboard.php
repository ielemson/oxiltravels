<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('pages/customer/index');
    }

    
}
