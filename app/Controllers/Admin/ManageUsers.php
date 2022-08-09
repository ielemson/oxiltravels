<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;
use Config\Services;

class ManageUsers extends BaseController
{

    public function __construct()
    {
        // start session
        $this->session = Services::session();


        if (session()->get('role') != "admin") {

            // echo "<a href='' style='color:red; text-align:center; text-decoration:none; font-weight:800'>Access Denied</a>";
            echo
            '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Access Denied</title>
<link rel="stylesheet" href="/frontend/css/bootstrap.css">
<link rel="stylesheet" href="/frontend/css/style.css">
</head>
<body>
<div class="page">
<section class="section section-single section-404 novi-background bg-overlay-3-41 novi-background context-dark">
<div class="section-single-inner">
<header class="section-single-header page-header">
<div class="page-head-inner"><a class="brand" href="index.html"><img class="logo-inverse-275x29" src="/frontend/images/oxil-global.png" alt="" width="275" height="29"/></a>
</div>
</header>

<div class="section-single-main">
<div class="container">
<h1 class="title-modern text-uppercase"><span>403</span></h1><span class="subtitle-404">Access Denied</span>
<p class="big text-spacing-25">This access level is above your jurisdiction. Please turn back</p>

<a class="button button-primary button-ujarak" href="/user/dashboard">Go to home page</a>

</div>
</div>
<div class="section-single-footer">
<div class="container text-center">
<!-- Rights-->
<p class="rights"><span>Oxyl Global</span><span>&nbsp;</span><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><a href="privacy-policy.html">Privacy Policy</a></p>
</div>
</div>

</div>
<div class="box-position" style="background-image: url(/frontend/images/bg-single-page.jpg);"></div>
</section>
</div>
</body>
</html>
';
            exit;
        }
    }


    public function index()
    {
        $userModel = new User();

        $data['users'] = $userModel->findAll();

        return view('pages/dashboard/users/index',$data);
    }

    public function create(){
        return view('pages/dashboard/users/create');
    }

    public function store(){
        helper('text','form');

		// save new user, validation happens in the model
		$userModel = new User();

		$getRule = $userModel->registerRule('registration');

		$userModel->setValidationRules($getRule);
		
        $user = [
            'name'          	=> $this->request->getPost('name'),
            'email'          	=> $this->request->getPost('email'),
            // 'phone'          	=> $this->request->getPost('phone'),
            // 'gender'          	=> $this->request->getPost('gender'),
            'role'          	=> $this->request->getPost('role'),
            'password'          => $this->request->getPost('password'),
            'password_confirm'  => $this->request->getPost('password_confirm'),
          
            // 'activate_hash' 	=> random_string('alnum', 32)
        ];

   
        if (! $userModel->save($user)) {

            return redirect()->to(base_url('admin/user/create'))->withInput()->with('errors',  $userModel->errors());
        }
  
            return redirect()->to(base_url('admin/users'))->with('success', "User created");
    }


    public function edit($id){

        $userModel = new User();
        $data['user'] = $userModel->where('id',$id)->first();

        return view('pages/dashboard/users/edit',$data);
    }

    public function update(){

        helper('text','form');

		// save new user, validation happens in the model
		$userModel = new User();

		$getRule = $userModel->registerRule('registration');

		$userModel->setValidationRules($getRule);

        if(empty($this->request->getPost('password'))):

            $user = [
                'id'                =>$this->request->getPost('id'),
                'name'          	=> $this->request->getPost('name'),
                'email'          	=> $this->request->getPost('email'),
                'role'          	=> $this->request->getPost('role'),
            ];

		else:
        $user = [
            'id'                =>$this->request->getPost('id'),
            'name'          	=> $this->request->getPost('name'),
            'email'          	=> $this->request->getPost('email'),
            'role'          	=> $this->request->getPost('role'),
            'password'          => $this->request->getPost('password'),
            'password_confirm'  => $this->request->getPost('password_confirm')
        ];

     endif;
        if (! $userModel->save($user)) {

            return redirect()->to(base_url('admin/user/create'))->withInput()->with('errors',  $userModel->errors());
        }
  
            return redirect()->to(base_url('admin/users'))->with('success', "User updated");
    }

    // public function destroy($id=null){

    //     $userModel = new User();
    //     $userModel->where('id', $id)->delete();
    //     return redirect()->to(base_url('admin/users'))->with('success', "User deleted sucessfully");

    // }



    public function destroy()
    {

        $userModel = new User();

            $userModel->where('id', $this->request->getPost('id'))->delete($this->request->getPost('id'));
            $data = [
                'success' => true,
            ];
            return $this->response->setJSON($data);
        
    }
}
