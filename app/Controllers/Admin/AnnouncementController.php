<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Annoucement;
use Config\Database;

class AnnouncementController extends BaseController
{
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
            $announcementModel->where('id', $this->request->getPost('id'))->delete($this->request->getPost('id'));
            //deleting from the database
        } 
        $data = [
            'success' => true,
            'msg'  => "Announcement removed",
        ];
        
        return $this->response->setJSON($data);
    }
}
