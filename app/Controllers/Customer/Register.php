<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Payment;
use App\Models\User;
use CodeIgniter\HTTP\Response;
use Config\Services;

class Register extends BaseController
{

    public function __construct()
	{
		// start session
		$this->session = Services::session();
	}

    public function index($email=null)
    {
        $data['title'] = "Register";
        $data['title_1'] = "Register Here";
        $data['title_2'] = "Register";
		$data['banner_img'] = "register.jpg";
		$data['active_nav_login'] = "active";
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


    public function save()
	{
		helper('text','form');

		// save new user, validation happens in the model
		$userModel = new User();

		$getRule = $userModel->registerRule('registration');

		$userModel->setValidationRules($getRule);
		
        $user = [
            'name'          	=> $this->request->getPost('name'),
            'email'          	=> $this->request->getPost('email'),
            'phone'          	=> $this->request->getPost('phone'),
            'gender'          	=> $this->request->getPost('gender'),
            'role'          	=> 'customer',
            'password'          => $this->request->getPost('password'),
            'password_confirm'  => $this->request->getPost('password_confirm'),
          
            // 'activate_hash' 	=> random_string('alnum', 32)
        ];

   
        if (! $userModel->save($user)) {

            return redirect()->to(base_url('customer/register'))->withInput()->with('errors',  $userModel->errors());
        }
            return redirect()->to(base_url('customer/login'))->with('success', "Account Registered");

         
	}


    // private function setUserSession($user)
    // {
    //     $data = [
    //         'id' => $user['id'],
    //         'firstname' => $user['name'],
    //         'email' => $user['email'],
    //         'role' => $user['role'],
    //         'isLoggedIn' => true,
    //     ];

    //     session()->set($data);
    //     return true;
    // }
}
