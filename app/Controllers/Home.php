<?php

namespace App\Controllers;

use App\Models\Annoucement;
use App\Models\Partner;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Visits;
use Config\Services;
class Home extends BaseController
{

    public function __construct()
    {
    // Loading database
        // OR $this->db = \Config\Database::connect();
        $this->session = Services::session();
    }
    public function index()
    {
        // $ip = $this->request->getIPAddress();
        // dd($ip);
        $visit = new Visits();
        $posts = new Post();
        $partner = new Partner();
        $announcement = new Annoucement();
		$data['title'] = "Home";
		$data['active_nav_index'] = "active";
       
        $data['announcement'] = $announcement->where('status', 1)->first();
        $data['posts'] = $posts->where('status', 1)->findAll();
        $data['partners'] = $partner->findAll();
        // dd($data);
        return view('pages/home',$data);
    }

    public function about(){
        $data['title'] = "About Us";
        $data['title_1'] = "About Us";
        $data['title_2'] = "About";
		$data['banner_img'] = "about_dk.jpg";
		$data['banner_active'] = "active";
		$data['active_nav_about'] = "active";
        return view('pages/about',$data);
    }

    public function contact(){
        $data['title'] = "Contact Us";
        $data['title_1'] = "Contact Us";
        $data['title_2'] = "Contact";
		$data['banner_img'] = "contact_dk.jpg";
		$data['banner_active'] = "active";
		$data['active_nav_contact'] = "active";
        return view('pages/contact',$data);
    }

    public function post($slug){
        $posts = new Post();
        $categories = new PostCategory();
        $data['categories'] = $categories->findAll();
        $data['post'] = $posts->where('slug', $slug)->first();
        $data['posts'] = $posts->where('status', 1)->orderBy("id", "DESC")->findAll(4);
        $data['title'] = "Post";
        $data['title_1'] = "Blog Post";
        $data['title_2'] = "Blog Post";
		$data['banner_img'] = "post_dk.jpg";
		$data['banner_active'] = "active";
		// $data['active_nav_contact'] = "active";
        return view('pages/post',$data);
    }

    public function category_post($slug){
        helper('text','form','data');
        $posts = new Post();
        $categories = new PostCategory();
        $data['category'] = $categories->where('name',$slug)->first();
        $data['posts'] = $posts->where('category_id', $data['category']['id'])->where('status',1)->orderBy("id", "DESC")->findAll();
        $data['pager'] = $posts->pager;
        $data['title'] = "Post";
        $data['title_1'] = "Blog Post";
        $data['title_2'] = "Blog Post";
		$data['banner_img'] = "post_dk.jpg";
		// $data['banner_active'] = "active";
		$data['active_nav_contact'] = "active";
        return view('pages/categorypost',$data);
    }
}
