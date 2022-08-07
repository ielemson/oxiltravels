<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Program;

class ProgramsController extends BaseController
{
    

    public function create(){
        return view('pages/dashboard/program/create');
    }

    public function store(){
       
        
        helper(['form', 'url','text']);
	
        $programModel = new Program();

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
                    
                    $programImg = $file->getRandomName();
                    $file->move('frontend/images/programs', $programImg);
                }
        
                $programModel->save( [
                    'title'          	=> $this->request->getPost('title'),
                    'status'          	=> $this->request->getPost('status'),
                    'start_date'          	=> $this->request->getPost('start_date'),
                    'end_date'          	=> $this->request->getPost('end_date'),
                    'pricing'          	=> $this->request->getPost('pricing'),
                    'price'          	=> $this->request->getPost('price'),
                    'bank'          	=> $this->request->getPost('bank'),
                    'account'          	=> $this->request->getPost('account'),
                    'details'          	=> $this->request->getPost('details'),
                    'img'          	   => $programImg,
                    // 'status'          	=> $this->request->getPost('status'),
                    'slug'  => url_title($this->request->getPost('title'), '-', true),
                   
                ]);
    
            return redirect()->to(base_url('admin/programs'))->with('success', "program created");
    
            } else {
                return redirect()->back()->withInput()->with('errors', $programModel->errors());
            }
               
    }

    public function view(){
        $programs = new Program();
        $data['programs'] = $programs->findAll();
        return view('pages/dashboard/program/index',$data);
    }


    public function edit($id){
        $programs = new Program();
        $data['program'] = $programs->where('id',$id)->first();
        return view('pages/dashboard/program/edit',$data);
    }


    public function update(){

        helper(['form', 'url','text']);
	
        $programModel = new Program();
       
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

                    // unlink image
                    $program =  $programModel->where('id', $this->request->getPost('id'))->first();
                    
                    if($program) { 
                    unlink('./frontend/images/programs/'.$program['img']);
                    }
                    
                    $programImg = $file->getRandomName();
                    $file->move('frontend/images/programs', $programImg);

                    $programModel->save( [
                        'id'                =>$this->request->getPost('id'),
                        'title'          	=> $this->request->getPost('title'),
                        'status'          	=> $this->request->getPost('status'),
                        'start_date'          	=> $this->request->getPost('start_date'),
                        'end_date'          	=> $this->request->getPost('end_date'),
                        'pricing'          	=> $this->request->getPost('pricing'),
                        'price'          	=> $this->request->getPost('price'),
                        'bank'          	=> $this->request->getPost('bank'),
                        'account'          	=> $this->request->getPost('account'),
                        'details'          	=> $this->request->getPost('details'),
                        'img'          	   => $programImg,
                        // 'status'          	=> $this->request->getPost('status'),
                        'slug'  => url_title($this->request->getPost('title'), '-', true),
                       
                    ]);

                }else{

                    $programModel->save( [
                        'id'                =>$this->request->getPost('id'),
                        'title'          	=> $this->request->getPost('title'),
                        'status'          	=> $this->request->getPost('status'),
                        'start_date'          	=> $this->request->getPost('start_date'),
                        'end_date'          	=> $this->request->getPost('end_date'),
                        'pricing'          	=> $this->request->getPost('pricing'),
                        'price'          	=> $this->request->getPost('price'),
                        'bank'          	=> $this->request->getPost('bank'),
                        'account'          	=> $this->request->getPost('account'),
                        'details'          	=> $this->request->getPost('details'),
                        // 'status'          	=> $this->request->getPost('status'),
                        'slug'  => url_title($this->request->getPost('title'), '-', true),
                       
                    ]);
                }
        
            
                return redirect()->to(base_url('admin/programs'))->with('success', "program updated");
    
            } else {
                return redirect()->back()->withInput()->with('errors', $programModel->errors());
            }
    }

    public function destroy($id=null){

        $programModel = new Program();
        $program =  $programModel->where('id', $id)->first();
        $programDelete =  $programModel->where('id', $id);
        
        if($program) { 
        unlink('./frontend/images/programs/'.$program['img']);
        $programDelete->delete();
        return redirect()->to(base_url('admin/programs'))->with('success', "Slider Deleted Sucessfully");
        }
        return redirect()->to(base_url('admin/programs/create'))->withInput()->with('errors', $programModel->errors());
    }
}
