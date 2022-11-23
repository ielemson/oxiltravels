<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
// use App\Models\BioData;
use Config\Services;

class RegisterController extends BaseController
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

        // Check if user is logged in
        $setting = new Setting();
        $postModel = new Post();
        if ($this->session->isLoggedIn && $this->session->role == "admin") {

            return redirect()->to(base_url('admin/dashboard'));
        } elseif ($this->session->isLoggedIn && $this->session->role == "customer") {
            return redirect()->to(base_url('user/dashboard'));
        }



        $data['title'] = "Register";
        $data['title_1'] = "Register Here";
        $data['title_2'] = "Register";
        $data['banner_img'] = "register.jpg";
        $data['active_nav_login'] = "active";
        $data['setting'] = $setting->where('id', 1)->first();
        $data['footerposts'] = $postModel->where('status', 1)->limit(2)->find();

        return view('pages/auth/register', $data);
    }

    public function register()
    {
        helper('text', 'form');

        // save new user, validation happens in the model
        $userModel = new User();

        $getRule = $userModel->registerRule('registration');

        $userModel->setValidationRules($getRule);

        $user = [
            'name'              => $this->request->getPost('name'),
            'email'              => $this->request->getPost('email'),
            // 'phone'          	=> $this->request->getPost('phone'),
            // 'gender'          	=> $this->request->getPost('gender'),
            'role'              => 'customer',
            'password'          => $this->request->getPost('password'),
            'password_confirm'  => $this->request->getPost('password_confirm'),

            // 'activate_hash' 	=> random_string('alnum', 32)
        ];


        if (!$userModel->save($user)) {

            return redirect()->to(base_url('auth/register'))->withInput()->with('errors',  $userModel->errors());
        }
        // $lastinsertId = $userModel->getInsertID();

        // $biodataModel = new BioData();

        // $biodata = [
        //     'user_id' => $lastinsertId
        // ];

        // $biodataModel->save($biodata);
        return redirect()->to(base_url('auth/login'))->with('success', "Account Registered");
    }
}
