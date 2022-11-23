<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Location;
use Config\Services;

class LocationController extends BaseController
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

    public function index (){
        $locationModel = new Location();
        $data['locations'] =   $locationModel->where('status',1)->findAll();
        return view('pages/dashboard/locations/index',$data);
    }
    public function create(){
        return view('pages/dashboard/locations/create');
    }

    public function store(){
       
        
        helper(['form', 'url','text']);
	
        $locationModel = new Location();

        // dd($this->request);
       
        if($this->request && $this->validate([

            'title' => 'required',
            'status' => 'required',
            'content'  => 'required',
            
            ])) {
    
                
                $file = $this->request->getFile('img');
                if($file->isValid() && !$file->hasMoved()) {
                    
                    $locationImg = $file->getRandomName();
                    $file->move('frontend/images/location', $locationImg);
                }
        
                $locationModel->save( [
                    'title'          	=> $this->request->getPost('title'),
                    'status'          	=> $this->request->getPost('status'),
                    'content'          	=> $this->request->getPost('content'),
                    'img'          	   => $locationImg,
                    // 'status'          	=> $this->request->getPost('status'),
                    'slug'  => url_title($this->request->getPost('title'), '-', true),
                   
                ]);
    
            return redirect()->to(base_url('admin/locations'))->with('success', "location created");
    
            } else {
                return redirect()->back()->withInput()->with('errors', $locationModel->errors());
            }
               
    }

    public function view(){
        $locations = new Location();
        $data['programs'] = $locations->findAll();
        return view('pages/dashboard/program/index',$data);
    }


    public function edit($id){
        $locations = new Location();
        $data['location'] = $locations->where('id',$id)->first();
        return view('pages/dashboard/locations/edit',$data);
    }


    public function update(){

        helper(['form', 'url','text']);
	
        $locationModel = new Location();
        // $data['location'] = $locationModel->where('id',$this->request->getPost('id'))->first();
       
        if($this->request && $this->validate([

            'title' => 'required',
            'status' => 'required',
            'content'  => 'required',
            
            ])) {
    
                
                $file = $this->request->getFile('img');
                if($file->isValid() && !$file->hasMoved()) {

                    // unlink image
                    $location =  $locationModel->where('id', $this->request->getPost('id'))->first();
                    
                    if($location) { 
                    unlink('./frontend/images/location/'.$location['img']);
                    }
                    
                    $locationImg = $file->getRandomName();
                    $file->move('frontend/images/location', $locationImg);

                    $locationModel->save( [
                    'id'          	=> $this->request->getPost('id'),
                    'title'          	=> $this->request->getPost('title'),
                    'status'          	=> $this->request->getPost('status'),
                    'content'          	=> $this->request->getPost('content'),
                    'img'          	   => $locationImg,
                    // 'status'          	=> $this->request->getPost('status'),
                    'slug'  => url_title($this->request->getPost('title'), '-', true),
                       
                    ]);

                }else{

                    $locationModel->save( [
                        'id'          	=> $this->request->getPost('id'),
                        'title'          	=> $this->request->getPost('title'),
                        'status'          	=> $this->request->getPost('status'),
                        'content'          	=> $this->request->getPost('content'),
                        // 'img'          	   => $locationImg,
                        // 'status'          	=> $this->request->getPost('status'),
                        'slug'  => url_title($this->request->getPost('title'), '-', true),
                    //    
                    ]);
                }
        
            
                return redirect()->to(base_url('admin/locations'))->with('success', "location updated");
    
            } else {
                return redirect()->back()->withInput()->with('errors', $locationModel->errors());
            }
    }

    
    public function destroy($id=null){

        $locationModel = new Location();
        $location =  $locationModel->where('id', $id)->first();
        $locationDelete =  $locationModel->where('id', $id);
        
        if($location) { 
        unlink('./frontend/images/location/'.$location['img']);
        $locationDelete->delete();
        return redirect()->to(base_url('admin/locations'))->with('success', "Location Deleted Sucessfully");
        }
        return redirect()->to(base_url('admin/location/create'))->withInput()->with('errors', $locationModel->errors());
    }
}
