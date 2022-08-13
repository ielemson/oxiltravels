<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Partner as ModelsPartner;
use Config\Services;

class Partner extends BaseController
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
        $partner = new ModelsPartner();
        $data['images'] = $partner->findAll();

        return view('pages/dashboard/partners/index',$data);
    }

    public function save(){
       
        helper(['form', 'url', 'text']);

        $post = new ModelsPartner();

            $file = $this->request->getFile('img');
            if ($file->isValid() && !$file->hasMoved()) {
                $partnerImg = $file->getRandomName();
                $file->move('frontend/images/partner', $partnerImg);
            }

            $post->save([
               'img'=> $partnerImg
            ]);

            return redirect()->to(base_url('admin/partner'))->with('success', "partner created");
        
    }


    public function destroy($id=null){

        $partnerModel = new ModelsPartner();

        $data['partner'] = $partnerModel->where('id', $id)->first();
        $folder = 'frontend/images/partner';
        if (file_exists($folder . '/' . $data['partner']['img'])) {
            unlink($folder . '/' . $data['partner']['img']);
            $partnerModel->where('id', $id)->delete();
            //deleting from the database
        }
       
        return redirect()->to(base_url('admin/partner'))->with('success', "partner removed");
    }
}
