<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\User;
use Config\Services;

class Login extends BaseController
{
    protected $session;
	protected $config;

    public function __construct()
	{
		// start session
		$this->session = Services::session();
	}

    public function index()
    {
        $data['title'] = "Login";
        $data['title_1'] = "Login Here";
        $data['title_2'] = "Login";
		$data['banner_img'] = "register.jpg";
		$data['active_nav_login'] = "active";

        return view('pages/login',$data);
    }


    public function login()
    {
        $rules = [
            'email'		=> 'required|valid_email',
            'password' 	=> 'required|min_length[5]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to(base_url('auth/user/login'))->withInput()->with('errors', $this->validator->getErrors());
        }

        // check credentials
        $users = new User();
        
        $user = $users->Where('email', $this->request->getPost('email'))->first();
        
        if ( is_null($user) || ! password_verify($this->request->getPost('password'), $user['password']) ) 
        {
            return redirect()->to(base_url('auth/user/login'))->withInput()->with('error', "invalid user credentials");
        }

          // Stroing session values
          $this->setUserSession($user);

            if($user['role'] == "admin"){

            return redirect()->to(base_url('admin/dashboard'));

            }elseif($user['role'] == "customer"){

            return redirect()->to(base_url('user/dashboard'));

            }     
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'fullname' => $user['name'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }
}
