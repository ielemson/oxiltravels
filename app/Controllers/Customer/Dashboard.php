<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Annoucement;
use App\Models\BioData;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Program;
use App\Models\User;
use Config\Services;

class Dashboard extends BaseController
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

        $biodataModel = new BioData();
        $data['biodata'] = $biodataModel->where('user_id', session()->get('id'))->first();

        $posts = new Post();
        $data['posts'] = $posts->where('status', 1)->findAll();

        $programsModel = new Program();
        $data['programs'] = $programsModel->where('status', 1)->findAll();
        // dd($data);
        return view('pages/customer/index', $data);
    }

    public function update_biodata()
    {

        $biodataModel = new BioData();

        $data = [

            'dob' => $this->request->getPost('dob'),
            'user_id' => session()->get('id'),
            'state' => $this->request->getPost('state'),
            'country' => $this->request->getPost('country'),
            'address' => $this->request->getPost('address'),
            'nexofkin_address' => $this->request->getPost('nexofkin_address'),
            'nexofkin' => $this->request->getPost('nexofkin'),
            'education' => $this->request->getPost('education'),
            'education_yr' => $this->request->getPost('education_yr'),

        ];

        $biodataModel->save($data);

        $data = [
            'success' => true,
        ];
        return $this->response->setJSON($data);
    }


    public function announcement()
    {

        $announcements = new Annoucement();
        $data['announcements'] = $announcements->findAll();
        return view('pages/dashboard/announcement/index', $data);
    }

    public function payments()
    {
        $payments = new Payment();

        $data['payments'] = $payments->where('user_id', session()->get('id'))->findAll();

        return view('pages/customer/payment/index', $data);
    }

    public function settings()
    {
        $userModel = new User();
        $biodataModel = new BioData();

        $data['user'] = $userModel->where('id', session()->get('id'))->first();
        $data['biodata'] = $biodataModel->where('user_id', session()->get('id'))->first();
        return view('pages/customer/settings/index', $data);
    }


    public function apply($pid)
    {

        $programMdel = new Program();
        $data['program'] = $programMdel->where('id', $pid)->first();

        $paymentModel = new Payment();
        $data['payment'] = $paymentModel->where('payment_for_id', $pid)->where('user_id', session()->get('id'))->first();

        return view('pages/customer/programs/apply', $data);
    }

    public function apply_program()
    {

        helper(['form', 'url', 'text']);

        // dd($this->request);
        $payment = new Payment();

        $file = $this->request->getFile('img');
        if ($file->isValid() && !$file->hasMoved()) {

            $paymentImg = $file->getRandomName();
            $file->move('frontend/images/payment', $paymentImg);

            $payment->save([
                'user_id'              => session()->get('id'),
                'payment_img'              => $paymentImg,
                'payment_for'              => $this->request->getPost('ptitle'),
                'payment_for_id'              => $this->request->getPost('pid'),
                'cost'              => $this->request->getPost('price')
            ]);
        } else {
            $payment->save([
                'user_id'              => session()->get('id'),
                // 'payment_img'              => $paymentImg,
                'payment_for'              => $this->request->getPost('ptitle'),
                'payment_for_id'              => $this->request->getPost('pid'),
                'cost'              => $this->request->getPost('price')
            ]);
        }
        return redirect()->to(base_url('user/dashboard'))->with('success', "payment created");
    }


    public function posts()
    {

        $posts = new Post();
        $data['posts'] = $posts->findAll();
        return view('pages/customer/post/index', $data);
    }

    public function profile()
    {
        helper('text', 'form');

        // save new user, validation happens in the model
        $userModel = new User();

        $getRule = $userModel->registerRule('registration');

        $userModel->setValidationRules($getRule);

        $user = [
            'id'                => session()->get('id'),
            'name'              => $this->request->getPost('name'),
            'email'              => $this->request->getPost('email'),
            'gender'              => $this->request->getPost('gender'),

            // 'password'          => $this->request->getPost('password'),
            // 'password_confirm'  => $this->request->getPost('password_confirm'),

            // 'activate_hash' 	=> random_string('alnum', 32)
        ];


        if (!$userModel->save($user)) {

            return redirect()->to(base_url('user/settings'))->withInput()->with('errors',  $userModel->errors());
        } else {

            $biodataModel = new BioData();
            $dataBio = [
                'id' => $this->request->getPost('bioId'),
                'dob' => $this->request->getPost('dob'),
                'user_id' => session()->get('id'),
                'state' => $this->request->getPost('state'),
                'phone' => $this->request->getPost('phone'),
                'gender' => $this->request->getPost('gender'),
                'country' => $this->request->getPost('country'),
                'address' => $this->request->getPost('address'),
                'nexofkin_address' => $this->request->getPost('nexofkin_address'),
                'nexofkin' => $this->request->getPost('nexofkin'),
                'education' => $this->request->getPost('education'),
                'education_yr' => $this->request->getPost('education_yr'),

            ];
            // dd($dataBio);
            $biodataModel->save($dataBio);
        }

        return redirect()->to(base_url('user/settings'))->with('success', "Profile Updated");
    }

    public function update_password()
    {
        helper('text', 'form');

        // save new user, validation happens in the model
        $userModel = new User();

        $getRule = $userModel->registerRule('registration');

        $userModel->setValidationRules($getRule);

        $user = [
            'id'                => session()->get('id'),
            'password'          => $this->request->getPost('password'),
            'password_confirm'  => $this->request->getPost('password_confirm'),
        ];

        
        if (!$userModel->save($user)) {

            return redirect()->to(base_url('user/settings'))->withInput()->with('errors',  $userModel->errors());
        }

        return redirect()->to(base_url('user/settings'))->with('success', "Password Updated");

    }
}
