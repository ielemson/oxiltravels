<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\Annoucement;
use App\Models\BioData;
use App\Models\Post;
use Config\Services;

class Dashboard extends BaseController
{
    protected $session;

	/**
	 * Authentication settings.
	 */
	protected $config;

    public function __construct()
	{
		// start session
		$this->session = Services::session();
	}


    public function index()
    {
        
        $biodataModel = new BioData();
        $data['biodata'] = $biodataModel->where('user_id',session()->get('id'))->first();
        
        $posts = new Post();
        $data['posts'] = $posts->where('status',1)->findAll();

        return view('pages/customer/index',$data);
    }

    public function update_biodata(){

        $biodataModel = new BioData();
        
        $data = [
        
            'dob' => $this->request->getPost('dob'),
            'user_id' => session()->get('id'),
            'state' => $this->request->getPost('state'),
            'country' => $this->request->getPost('country'),
            'address' => $this->request->getPost('address'),
            'nexofkin_address' => $this->request->getPost('nexofkin_address'),
            'nexofkin' => $this->request->getPost('nexofkin'),
            'education' => $this->request->getPost('education'),
            'education_yr' => $this->request->getPost('education_yr'),

        ];

        $biodataModel->save($data);

        $data = [
            'success' => true,
        ];
        return $this->response->setJSON($data);
    }


    public function announcement(){

        $announcements = new Annoucement();
        $data['announcements'] = $announcements->findAll();
        return view('pages/dashboard/announcement/index',$data);
    }
}
