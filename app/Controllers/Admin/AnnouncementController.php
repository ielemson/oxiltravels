<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Annoucement;
use Config\Database;
use Config\Services;

class AnnouncementController extends BaseController
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


    public function announce()
    {
        $announcements = new Annoucement();
        $data['announcements'] = $announcements->findAll();
        return view('pages/dashboard/announcement/index',$data);
    }

    

    public function create_page(){
        return view('pages/dashboard/announcement/create');
    }



    public function store_annoucement(){
       
        helper(['form', 'url','text']);
	
        $post = new Annoucement();
       
        if($this->request && $this->validate([

            'title' => 'required',
            'status' => 'required',
            'announcement'  => 'required',
            // 'content'  => 'required',
            
            ])) {
    
                
                $file = $this->request->getFile('img');
                if($file->isValid() && !$file->hasMoved()) {
                    $postImg = $file->getRandomName();
                    $file->move('frontend/images/announcements', $postImg);
                }
        
                $post->save( [
                    'title'          	=> $this->request->getPost('title'),
                    'status'          	=> $this->request->getPost('status'),
                    'announcement'          	=> $this->request->getPost('announcement'),
                    'img'          	   => $postImg,
                    // 'status'          	=> $this->request->getPost('status'),
                    'slug'  => url_title($this->request->getPost('title'), '-', true),
                   
                ]);
    
            return redirect()->to(base_url('admin/announcement'))->with('success', "announcement created");
    
            } else {
                return redirect()->back()->withInput()->with('errors', $post->errors());
            }
               
    }

    

    public function edit_annoucement($id){

        $announcementModel = new Annoucement();
        $data['announcement'] = $announcementModel->where('id',$id)->first(); 
        return view('pages/dashboard/announcement/edit',$data);
    }

    public function update_annoucement($id){

        $announcementModel = new Annoucement();
       $data['announcement'] = $announcementModel->where('id',$id)->first();

       if($this->request && $this->validate([

        'title' => 'required',
        'status' => 'required',
        'announcement'  => 'required',
        // 'content'  => 'required',
        
        ])) {

        
            if($this->request->getFile('img')->isValid()){

                $file = $this->request->getFile('img');
                
                $folder = 'frontend/images/announcements';
                if(file_exists($folder.'/'.$data['announcement']['img'])) {
                    unlink($folder.'/'.$data['announcement']['img']);
                } 

                if($file->isValid() && !$file->hasMoved()) {

                    $announcementImg = $file->getRandomName();
                    $file->move('frontend/images/announcements', $announcementImg);

                }
        
                $data = [
                'title'          	 => $this->request->getPost('title'),
                'status'          	 => $this->request->getPost('status'),
                'announcement'          	=> $this->request->getPost('announcement'),
                'img'          	      => $announcementImg,
                // 'status'          	=> $this->request->getPost('status'),
                'slug'  => url_title($this->request->getPost('title'), '-', true),
               
            ];
                    $announcementModel->update($id,$data);
            }else{

                $data = [
                    'title'          	=> $this->request->getPost('title'),
                    'status'          	=> $this->request->getPost('status'),
                    'announcement'          	=> $this->request->getPost('announcement'),
                    'slug'  => url_title($this->request->getPost('title'), '-', true),
                   
                ];

                $announcementModel->update($id,$data);
            }
    
          

         return redirect()->to(base_url('admin/announcement'))->with('success', "announcement updated");

        } else {
           return redirect()->back()->withInput()->with('errors', $announcementModel->errors());
        }
    }
    
    
    public function delete_annoucement (){

        $announcementModel = new Annoucement();

        $data['announcement'] = $announcementModel->where('id', $this->request->getPost('id'))->first();
        $folder = 'frontend/images/announcements';
        if(file_exists($folder.'/'.$data['announcement']['img'])) {
            unlink($folder.'/'.$data['announcement']['img']);
            $announcementModel->where('id', $this->request->getPost('id'))->delete();
            //deleting from the database
        } 
        $data = [
            'success' => true,
            'msg'  => "Announcement removed",
        ];
        
        return $this->response->setJSON($data);
    }
}
