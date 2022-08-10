<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BioData;
use App\Models\Payment;
use App\Models\Program;
use App\Models\User;
use Config\Services;


class Admin extends BaseController
{
   
    public function __construct()
    {
        // start session
		$this->session = Services::session();

        if (session()->get('role') != "admin") {
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


    public function payments(){
        $payments = new Payment();

        $data['payments'] = $payments->findAll();

        return view('pages/dashboard/payment/index',$data);
    }

    public function payment($pid){
     
        $payment = new Payment();
        $data['payment'] = $payment->where('id',$pid)->first();

        $user = new User();
        $data['user'] = $user->where('id',$data['payment']['user_id'])->first();

        $program = new Program();
        $data['program'] = $program->where('id',$data['payment']['payment_for_id'])->first();
        
        $biodata = new BioData();
        $data['biodata'] = $biodata->where('user_id',$data['payment']['user_id'])->first();
        return view('pages/dashboard/payment/approval',$data);

    }


    public function approve_payment(){
        helper(['form', 'url', 'text']);
        $payment = new Payment();

        $data = [ 'status' => $this->request->getPost('status')];
        // dd($data);
        $payment->update($this->request->getPost('id'), $data);
        
         $data = [
                'u_email'=>session()->get('u_email'),
                'program'=>$this->request->getPost('p_title')
            ];

          if($this->request->getPost('status') == 1){
                $email = \Config\Services::email();
         // Using a custom template
        $template = view("email/approval", $data);
        $email->setFrom('admin@oxlyglobal.com', 'Payment Approval');
        $email->setTo($this->request->getPost('email'));
        $email->setSubject($this->request->getPost('ptitle'));
        $email->setMessage($template);//your message here
      
        $email->setCC('admin@oxlyglobal.com');//CC
        $email->setBCC('admin@oxlyglobal.com');//BCC
        $email->send();
        
            }
        
        
        
        return redirect()->to(base_url('admin/payments'))->with('success', "payment updated successfuly");
    }
}
