<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Post as ModelPost;
use App\Models\PostCategory;


class Post extends BaseController
{
    public function index()
    {
        $posts = new ModelPost();
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
	
        $post = new ModelPost();

       
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
        $categories = new PostCategory();
        $data['categories'] = $categories->findAll();
        return view('pages/dashboard/category/create',$data);
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

    public function category_update(){
            $category = new PostCategory();

            $data = [
                'name'          	=> $this->request->getPost('name'),
               
            ];

            $category->update($this->request->getPost('id'),$data);

            $data = [
                'success' => true,
            ];
            return $this->response->setJSON($data);
        }
    
 
        public function category_destroy(){

            $postModel = new ModelPost();

            $post = $postModel->where('category_id',$this->request->getPost('id'))->first();
            
            if(!empty($post)){
                $data = [
                    'error' => true,
                ];
                return $this->response->setJSON($data);   
            }else{
            $categoryModel = new PostCategory();

            $categoryModel->where('id', $this->request->getPost('id'))->delete($this->request->getPost('id'));
            $data = [
                'success' => true,
            ];
            return $this->response->setJSON($data);

            }
            
        }

    public function edit($id){
        $post = new ModelPost();
        $categories = new PostCategory();
        $data['categories'] = $categories->findAll();
        $data['post'] = $post->where('id',$id)->first();
       
        return view('pages/dashboard/post/edit',$data);
    }

    public function update_post($id){
       $post = new ModelPost();
       $data['post'] = $post->where('id',$id)->first();

       if($this->request && $this->validate([

        'category' => 'required',
        'title' => 'required',
        // 'img'  => 'required',
        'status'  => 'required',
        'content'  => 'required',
        
        ])) {

            

            if(!empty($this->request->getFile('img'))){

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

    
    public function destroy(){

        $postModel = new ModelPost();

        $data['post'] = $postModel->where('id', $this->request->getPost('id'))->first();
        $folder = 'frontend/images/post';
        if(file_exists($folder.'/'.$data['post']['file'])) {
            unlink($folder.'/'.$data['post']['file']);
            $postModel->where('id', $this->request->getPost('id'))->delete($this->request->getPost('id'));
            //deleting from the database
        } 
        $data = [
            'success' => true,
            'msg'  => "Post removed",
        ];
        
        return $this->response->setJSON($data);
    }
}
