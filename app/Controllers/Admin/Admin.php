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
        $payment = new Payment();
        $data['users'] = $userModel->countAll();
        $data['payment'] = $payment->where('status', 1)->findAll();

        return view('pages/dashboard/index', $data);
        // return 'admin';
    }


    public function payments()
    {
        $payments = new Payment();

        $data['payments'] = $payments->findAll();

        return view('pages/dashboard/payment/index', $data);
    }

    public function payment($pid)
    {

        $payment = new Payment();
        $data['payment'] = $payment->where('id', $pid)->first();

        $user = new User();
        $data['user'] = $user->where('id', $data['payment']['user_id'])->first();

        $program = new Program();
        $data['program'] = $program->where('id', $data['payment']['payment_for_id'])->first();

        $biodata = new BioData();
        $data['biodata'] = $biodata->where('user_id', $data['payment']['user_id'])->first();
        return view('pages/dashboard/payment/approval', $data);
    }


    public function approve_payment()
    {
        helper(['form', 'url', 'text']);
        $payment = new Payment();

        $data = ['status' => $this->request->getPost('status'),];
        // dd($data)
        $payment->update($this->request->getPost('id'), $data);
        return redirect()->to(base_url('admin/payments'))->with('success', "payment updated");
    }

    public function destroy_payment()
    {

        $paymentModel = new Payment();

        $data['payment'] = $paymentModel->where('id', $this->request->getPost('id'))->first();
        $folder = 'frontend/images/payment';
        if (file_exists($folder . '/' . $data['payment']['payment_img'])) {
            unlink($folder . '/' . $data['payment']['payment_img']);
        }
        $paymentModel->where('id', $this->request->getPost('id'))->delete();

        $data = [
            'success' => true,
            'msg'  => "payment removed",
        ];

        return $this->response->setJSON($data);
    }
}
