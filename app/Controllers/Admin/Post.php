<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Post as ModalPost;
use App\Models\PostCategory;


class Post extends BaseController
{
    public function index()
    {
        $posts = new ModalPost();
        $data['posts'] = $posts->findAll();
        return view('pages/dashboard/post/index',$data);
    }

    public function create(){
        $categories = new PostCategory();
        $data['categories'] = $categories->findAll();
        return view('pages/dashboard/post/create',$data);
    }


    
    public function save(){

        helper(['form', 'url','text']);
	
        $post = new ModalPost();

       
        if($this->request && $this->validate([

            'category' => 'required',
            'title' => 'required',
            // 'img'  => 'required',
            'status'  => 'required',
            'content'  => 'required',
            
            ])) {
    
                
                $file = $this->request->getFile('img');
                if($file->isValid() && !$file->hasMoved()) {
                    $postImg = $file->getRandomName();
                    $file->move('frontend/images/post', $postImg);
                }
        
                $post->save( [
                    'category_id'          	=> $this->request->getPost('category'),
                    'content'          	=> $this->request->getPost('content'),
                    'title'          	=> $this->request->getPost('title'),
                    'file'          	   => $postImg,
                    'status'          	=> $this->request->getPost('status'),
                    'slug'  => url_title($this->request->getPost('title'), '-', true),
                   
                ]);
    
            return redirect()->to(base_url('admin/post/index'))->with('success', "post created");
    
            } else {
               return redirect()->back()->withInput()->with('errors', $post->errors());
            }
    }

    public function create_category(){
        return view('pages/dashboard/category/create');
    }

    public function store_category(){
        helper(['form', 'url','text']);
	
        $post = new PostCategory();

       
        if($this->request && $this->validate([

            'name'  => 'required|is_unique[categories.name]',
            
            ])) {
    
               
                $post->save( [
                    'name' => $this->request->getPost('name')
                ]);
    
             return redirect()->to(base_url('admin/post/category/create'))->with('success', "category created");
    
            } else {
               return redirect()->back()->withInput()->with('errors', $post->errors());
            }
    }

    public function edit($id){
        $post = new ModalPost();
        $categories = new PostCategory();
        $data['categories'] = $categories->findAll();
        $data['post'] = $post->where('id',$id)->first();
       
        return view('pages/dashboard/post/edit',$data);
    }

    public function update_post($id){
       $post = new ModalPost();
       $data['post'] = $post->where('id',$id)->first();

       if($this->request && $this->validate([

        'category' => 'required',
        'title' => 'required',
        // 'img'  => 'required',
        'status'  => 'required',
        'content'  => 'required',
        
        ])) {

            

            if(!empty($_FILES['file']['img'])){

                $file = $this->request->getFile('img');

                if($file->isValid() && !$file->hasMoved()) {

                    $postImg = $file->getRandomName();
                    $file->move('frontend/images/post', $postImg);

                }
        
                
                $data = [
                'category_id'          	=> $this->request->getPost('category'),
                'content'          	=> $this->request->getPost('content'),
                'title'          	=> $this->request->getPost('title'),
                'file'          	   => $postImg,
                'status'          	=> $this->request->getPost('status'),
                'slug'  => url_title($this->request->getPost('title'), '-', true),
               
            ];
                     $post->update($id,$data);
            }else{

                $data = [
                    'category_id'          	=> $this->request->getPost('category'),
                    'content'          	=> $this->request->getPost('content'),
                    'title'          	=> $this->request->getPost('title'),
                    'status'          	=> $this->request->getPost('status'),
                    'slug'  => url_title($this->request->getPost('title'), '-', true),
                   
                ];

                $post->update($id,$data);
            }
    
          

        return redirect()->to(base_url('admin/post/index'))->with('success', "post created");

        } else {
           return redirect()->back()->withInput()->with('errors', $post->errors());
        }

    }
}
