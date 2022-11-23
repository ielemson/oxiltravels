<?php

namespace App\Controllers;

use App\Models\Annoucement;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Slider;
use App\Models\PostCategory;
use App\Models\Setting;
use App\Models\Location;
use App\Models\Visits;
use Config\Services;
class HomeController extends BaseController
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
        $slider = new Slider();
        $setting = new Setting();
        $locations = new Location();
        $announcement = new Annoucement();
		$data['title'] = "Home";
		$data['active_nav_index'] = "active";
        $data['announcement'] = $announcement->where('status', 1)->first();
        $data['setting'] = $setting->where('id', 1)->first();
        $data['posts'] = $posts->where('status', 1)->findAll();
        $data['footerposts'] = $posts->where('status', 1)->limit(2)->find();
        $data['locations'] = $locations->where('status', 1)->limit(3)->find();
        $data['partners'] = $partner->findAll();
        $data['sliders'] = $slider->findAll();
        // dd($data);
        return view('pages/home',$data);
    }

    public function about(){
        $setting = new Setting();
        $data['setting'] = $setting->where('id', 1)->first();
        $posts = new Post();
        $data['footerposts'] = $posts->where('status', 1)->limit(2)->find();
        $data['title'] = "About Us";
        $data['title_1'] = "About Us";
        $data['title_2'] = "About";
		$data['banner_img'] = "about_dk.jpg";
		$data['banner_active'] = "active";
		$data['active_nav_about'] = "active";
        return view('pages/about',$data);
    }

    public function contact(){
        $setting = new Setting();
        $data['setting'] = $setting->where('id', 1)->first();
        $posts = new Post();
        $data['footerposts'] = $posts->where('status', 1)->limit(2)->find();
        $data['title'] = "Contact Us";
        $data['title_1'] = "Contact Us";
        $data['title_2'] = "Contact";
		$data['banner_img'] = "contact_dk.jpg";
		$data['banner_active'] = "active";
		$data['active_nav_contact'] = "active";
        return view('pages/contact',$data);
    }
    public function tours(){
        $locationModel = new Location();
        $setting = new Setting();
        $posts = new Post();
        $data['footerposts'] = $posts->where('status', 1)->limit(2)->find();
        $data['title'] = "Our tours";
        $data['title_1'] = "Our tours";
        $data['title_2'] = "Tours";
		$data['banner_img'] = "contact_dk.jpg";
		$data['banner_active'] = "active";
		// $data['active_nav_contact'] = "active";
		$data['tours'] = $locationModel->findAll();
        $data['setting'] = $setting->where('id', 1)->first();
        return view('pages/tours',$data);
    }
    public function tour($slug=null){
        // dd($id);
        $locationModel = new Location();
        $setting = new Setting();
        $posts = new Post();
        $data['footerposts'] = $posts->where('status', 1)->limit(2)->find();
        $data['tour'] = $locationModel->where('slug',$slug)->first();
        $data['setting'] = $setting->where('id', 1)->first();
        $data['title'] = "Our tours";
        $data['title_1'] = "Our tours";
        $data['title_2'] = $data['tour']['title'];
		$data['banner_img'] = "contact_dk.jpg";
		$data['banner_active'] = "active";
        return view('pages/tour',$data);
    }

    public function post($slug){
        $posts = new Post();
        $categories = new PostCategory();
        $setting = new Setting();
        $posts = new Post();
        $data['footerposts'] = $posts->where('status', 1)->limit(2)->find();
        $data['setting'] = $setting->where('id', 1)->first();
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
        $setting = new Setting();
        $posts = new Post();
        $data['footerposts'] = $posts->where('status', 1)->limit(2)->find();
        $data['setting'] = $setting->where('id', 1)->first();
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

    public function contactus(){
        $rules = [
            'email'		=> 'required|valid_email',
            'fname' 	=> 'required|min_length[5]',
            'lname' 	=> 'required|min_length[5]',
            'message' 	=> 'required|min_length[5]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to(base_url('contact'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'u_email'=>$this->request->getPost('email'),
            'u_name'=>$this->request->getPost('fname').''.$this->request->getPost('lname'),
            'u_message'=>$this->request->getPost('message')
        ];

    
    $email = \Config\Services::email();
     // Using a custom template
    $template = view("email/contact", $data);
    $email->setFrom('admin@oxlyglobal.com', 'Contact Us');
    $email->setTo($data['u_email']);
    $email->setSubject('You have a new contact us message');
    $email->setMessage($template);//your message here
  
    $email->setCC('admin@oxlyglobal.com');//CC
    $email->setBCC('admin@oxlyglobal.com');//BCC
    $email->send();
   
    
    return redirect()->to(base_url('contact'))->with('success', "Your message was sent successfully.");
    }
}
