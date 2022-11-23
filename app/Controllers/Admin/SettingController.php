<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Setting;
use App\Models\Slider;
use Config\Database;
use Config\Services;

class SettingController extends BaseController
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

public function generalSettings(){
    $settingModel = new Setting();
    $sliderModel = new Slider();
    $data['sliders'] = $sliderModel->findAll();
    // dd($data);
    $data['setting'] = $settingModel->where('id',1)->first();
    return view('pages/dashboard/settings/index',$data);
}
public function sliderSettings(){
    return view('pages/dashboard/settings/contact');
}
 

public function update_general(){

    helper('text','form');
    $settingModel = new Setting();

    $setting = [
        'id'                =>1,
        'email'          	=> $this->request->getPost('email'),
        'phone'          	=> $this->request->getPost('phone'),
        'resume'          	=> $this->request->getPost('open'),
        'close'          => $this->request->getPost('close'),
        'address'  => $this->request->getPost('address'),
        // 'facebook'  => $this->request->getPost('facebook'),
        // 'twitter'  => $this->request->getPost('twitter'),
        // 'instagram'  => $this->request->getPost('instagram')
    ];

    // dd($setting);


    if (! $settingModel->save($setting)) {

        return redirect()->to(base_url('admin/settings'))->withInput()->with('errors',  $settingModel->errors());
    }

        return redirect()->to(base_url('admin/settings'))->with('success', "Settings updated");
}


public function update_url(){

    helper('text','form');
    $settingModel = new Setting();

    $setting = [
        'id'                =>1,
        // 'email'          	=> $this->request->getPost('email'),
        // 'phone'          	=> $this->request->getPost('phone'),
        // 'resume'          	=> $this->request->getPost('open'),
        // 'close'          => $this->request->getPost('close'),
        // 'address'  => $this->request->getPost('address'),
        'facebook'  => $this->request->getPost('facebook'),
        'twitter'  => $this->request->getPost('twitter'),
        'instagram'  => $this->request->getPost('instagram')
    ];

    // dd($setting);


    if (! $settingModel->save($setting)) {

        return redirect()->to(base_url('admin/settings'))->withInput()->with('errors',  $settingModel->errors());
    }

        return redirect()->to(base_url('admin/settings'))->with('success', "Settings updated");
}


public function slider(){
       
    helper(['form', 'url','text']);

    $post = new Slider();
   
    if($this->request && $this->validate([

        'title_1' => 'required',
        'title_2' => 'required',
        // 'img'  => 'required',
        // 'content'  => 'required',
        
        ])) {

            
            $file = $this->request->getFile('img');
            if($file->isValid() && !$file->hasMoved()) {
                $sliderImg = $file->getRandomName();
                $file->move('frontend/images/sliders', $sliderImg);
            }
    
            $post->save( [
                'title_1'          	=> $this->request->getPost('title_1'),
                'title_2'          	=> $this->request->getPost('title_2'),
                'img'          	   => $sliderImg,
                // 'status'          	=> $this->request->getPost('status'),
                // 'slug'  => url_title($this->request->getPost('title'), '-', true),
               
            ]);

        return redirect()->to(base_url('admin/settings'))->with('success', "slider created");

        } else {
            return redirect()->back()->withInput()->with('errors', $post->errors());
        }
           
}

public function slider_edit($id=null){
    $sliderModel = new Slider();
    $data['slider'] = $sliderModel->where('id',$id)->first();
    return view('pages/dashboard/settings/slider',$data);
}


public function slider_update(){

    helper(['form', 'url','text']);

    $sliderModel = new Slider();
   
    if($this->request && $this->validate([

        'title_1' => 'required',
        'title_2' => 'required',
        // 'content'  => 'required',
        
        ])) {

            
            $file = $this->request->getFile('img');
            if($file->isValid() && !$file->hasMoved()) {

                // unlink image
                $slider =  $sliderModel->where('id', $this->request->getPost('id'))->first();
                
                if($slider) { 
                unlink('./frontend/images/sliders/'.$slider['img']);
                }
                
                $sliderImg = $file->getRandomName();
                $file->move('frontend/images/sliders', $sliderImg);

                $sliderModel->save( [
                    'id'                =>$this->request->getPost('id'),
                    'title_1'          	=> $this->request->getPost('title_1'),
                    'title_2'          	=> $this->request->getPost('title_2'),
                    'img'          	   => $sliderImg,
            
                   
                ]);

            }else{

                $sliderModel->save( [
                    'id'                =>$this->request->getPost('id'),
                    'title_1'          	=> $this->request->getPost('title_1'),
                    'title_2'          	=> $this->request->getPost('title_2'),
                    // 'img'          	   => $sliderImg,
                   
                ]);
            }
    
        
            return redirect()->to(base_url('admin/settings'))->with('success', "slider updated");

        } else {
            return redirect()->back()->withInput()->with('errors', $sliderModel->errors());
        }
}

public function slider_destroy($id=null){

    $sliderModel = new Slider();
    $slider =  $sliderModel->where('id', $id)->first();
    $slierDelete =  $sliderModel->where('id', $id);
    
    if($slider) { 
    unlink('./frontend/images/sliders/'.$slider['img']);
    $slierDelete->delete();
    return redirect()->to(base_url('admin/settings'))->with('success', "Slider Deleted Sucessfully");
    }
    return redirect()->to(base_url('admin/settings'))->withInput()->with('errors', $sliderModel->errors());
}
}
