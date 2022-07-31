<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;
use Config\Services;

class Login extends BaseController
{

    protected $session;

	/**
	 * Authentication settings.
	 */
	protected $config;

    public function __construct()
	{
		// start session
		$this->session = Services::session();
	}

    public function index()
    {
        return view('pages/auth/login');
    }
   
    public function login()
        {
            $rules = [
                'email'		=> 'required|valid_email',
                'password' 	=> 'required|min_length[5]',
            ];
    
            if (! $this->validate($rules)) {
                return redirect()->to(base_url('auth/admin/login'))->withInput()->with('errors', $this->validator->getErrors());
            }
    
            // check credentials
            $users = new User();
            
            $user = $users->Where('email', $this->request->getPost('email'))->first();
            
            if ( is_null($user) || ! password_verify($this->request->getPost('password'), $user['password']) ) 
            {
                return redirect()->to(base_url('auth/admin/login'))->withInput()->with('error', "invalid user credentials");
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

        public function logout()
        {
        
            session()->destroy();
            // return redirect()->to('login');
            return redirect()->to(base_url('auth/admin/login'));
        }

        public function userLogout()
        {
        
            session()->destroy();
            // return redirect()->to('login');
            return redirect()->to(base_url('auth/user/login'));
        }

    }
