<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;

class ManageUsers extends BaseController
{
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
