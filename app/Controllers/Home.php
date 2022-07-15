<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
     
		$data['title'] = "Home";
		$data['active_nav_index'] = "active";

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
}
