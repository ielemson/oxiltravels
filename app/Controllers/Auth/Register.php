<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\User;

class Register extends BaseController
{
    public function index()
    {
        return view('pages/auth/register');
    }

    public function save()
	{
		helper('text','form');

		// save new user, validation happens in the model
		$users = new User();

		$getRule = $users->registerRule('registration');

		$users->setValidationRules($getRule);
		
        $user = [
            'name'          	=> $this->request->getPost('name'),
            'email'          	=> $this->request->getPost('email'),
            'password'          => $this->request->getPost('password'),
            'password_confirm'          => $this->request->getPost('password_confirm'),
          
            // 'activate_hash' 	=> random_string('alnum', 32)
        ];

   
        if (! $users->save($user)) {

            return redirect()->to(base_url('register'))->withInput()->with('errors',  $users->errors());
        }
            return redirect()->to(base_url('login'))->with('success', "Account Registered");
	}
}
