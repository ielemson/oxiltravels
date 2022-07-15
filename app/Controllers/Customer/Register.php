<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Payment;
use CodeIgniter\HTTP\Response;

class Register extends BaseController
{
    public function index($email=null)
    {
        $data['title'] = "Register";
        $data['title_1'] = "Register Here";
        $data['title_2'] = "Register";
		$data['banner_img'] = "register.jpg";
		$data['banner_active'] = "active";
		// $data['active_nav_about'] = "active";

        return view('pages/register',$data);
    }


    public function store(){

        helper(['form', 'url','text']);
	
        $payment = new Payment();

        if($this->request && $this->validate([

            'name' => 'required',
            'email' => 'required',
            'phone'  => 'required',
            'kin'  => 'required',
            'kin_address'  => 'required',
            'education'  => 'required',
            'education_yr'  => 'required',
            'dob'  => 'required',
            'gender'  => 'required',
            'referral'  => 'required',
            
            ])) {
    
                
                $file = $this->request->getFile('file');
                if($file->isValid() && !$file->hasMoved()) {
                    $paymentImg = $file->getRandomName();
                    $file->move('frontend/images/payment', $paymentImg);
                }
        
                $payment->save( [
                    'name'          	=> $this->request->getPost('name'),
                    'email'          	=> $this->request->getPost('email'),
                    'payment'          	=> $paymentImg,
                    'phone'          	=> $this->request->getPost('phone'),
                    'kin'          	=> $this->request->getPost('kin'),
                    'kin_address'              	=> $this->request->getPost('kin_address'),
                    'education'         	=> $this->request->getPost('education'),
                    'education_yr'         	=> $this->request->getPost('education_yr'),
                    'dob'         	=> $this->request->getPost('dob'),
                    'gender'         	=> $this->request->getPost('gender'),
                    'referral'         	=> $this->request->getPost('referral')
                   
                ]);
    
            return redirect()->to(base_url('customer/payment'))->with('success', "payment received");
    
            } else {
               return redirect()->back()->withInput()->with('errors', $payment->errors());
            }
    }
}
