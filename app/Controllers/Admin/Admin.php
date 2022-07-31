<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Payment;
use App\Models\User;
use Config\Services;


class Admin extends BaseController
{
   
    public function __construct()
    {
        // start session
		$this->session = Services::session();

        if (session()->get('role') != "admin") {
            // echo 'Access denied';
            // exit;
            return redirect()->to(base_url('admin/login'))->with('error', "access denied");
    }

    }

    
    public function index()
    {
        $userModel = new User();

        $data['users'] = $userModel->countAll();
      
        return view('pages/dashboard/index',$data);
        // return 'admin';
    }


    public function users(){

        $userModel = new User();

        $data['users'] = $userModel->findAll();

        return view('pages/dashboard/users/index',$data);
    }

    public function payments(){
        $payments = new Payment();

        $data['payments'] = $payments->findAll();

        return view('pages/dashboard/payment/index',$data);
    }
}
