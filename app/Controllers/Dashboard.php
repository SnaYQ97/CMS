<?php namespace App\Controllers;

use CodeIgniter\Controller;
//use App\Models\SigninModel;
//use CodeIgniter\HTTP\IncomingRequest;

class Dashboard extends Controller
{
    public function index() 
    {   
        $security = \Config\Services::security();
        $validation =  \Config\Services::validation();
        $session = \Config\Services::session();
        helper(['form', 'url', 'cookie']);
        if (isset($_SESSION['logged_in'])) {
            $cookie_data = [
                'name' => 'logged_before',
                'value' => $session->get('email'),
                'expire' => '86400'
                /* 'secure' => TRUE,
                'httpOnly' => TRUE */
            ];
            set_cookie($cookie_data);
            return view('success');
        }
        else {
            return redirect()->to('signin');
        }    
    }
}