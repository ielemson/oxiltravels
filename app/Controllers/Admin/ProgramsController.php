<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Program;

class ProgramsController extends BaseController
{
    public function index()
    {
        //
    }

    public function create(){
        return view('pages/dashboard/program/create');
    }

    public function store(){
       
        
        helper(['form', 'url','text']);
	
        $post = new Program();

        // dd($this->request);
       
        if($this->request && $this->validate([

            'title' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'pricing'  => 'required',
            'price'  => 'required',
            'details'  => 'required',
            // 'content'  => 'required',
            
            ])) {
    
                
                $file = $this->request->getFile('img');
                if($file->isValid() && !$file->hasMoved()) {
                    $postImg = $file->getRandomName();
                    $file->move('frontend/images/programs', $postImg);
                }
        
                $post->save( [
                    'title'          	=> $this->request->getPost('title'),
                    'status'          	=> $this->request->getPost('status'),
                    'start_date'          	=> $this->request->getPost('start_date'),
                    'end_date'          	=> $this->request->getPost('end_date'),
                    'pricing'          	=> $this->request->getPost('pricing'),
                    'price'          	=> $this->request->getPost('price'),
                    'details'          	=> $this->request->getPost('details'),
                    'img'          	   => $postImg,
                    // 'status'          	=> $this->request->getPost('status'),
                    'slug'  => url_title($this->request->getPost('title'), '-', true),
                   
                ]);
    
            return redirect()->to(base_url('admin/programs/index'))->with('success', "program created");
    
            } else {
                return redirect()->back()->withInput()->with('errors', $post->errors());
            }
               
    }

}
