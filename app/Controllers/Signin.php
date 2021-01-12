<?php 

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SigninModel;
use CodeIgniter\HTTP\IncomingRequest;
//use CodeIgniter\HTTP\IncomingRequest;


class Signin extends Controller
{

    protected $helpers = ['url', 'form', 'cookie'];
    private $config;

    /* public function __construct() {
       
    }  */

    private function createView($className, $functionName, $data='') {
        require('Viewdata.php');
        $this->config = $config;
        $config = $this->config;

        if(isset($_COOKIE['logged_before'])) {
            $user = [
                'name' => 'Artur',
                'surname' => 'Domurad',
                'rolename' => 'Administrator',
                'avatar' => 'assets/images/profiles/2/avatar.jpg',
           ];
            
        }else {
            $user = [
                'name' => '',
                'surname' => '',
                'rolename' => '',
                'avatar' => 'assets/images/profiles/0/avatar.jpg',
           ];
        }

        $data = [
            'data' => $data,
            'header' => $config[$className][$functionName]['header'],
            'content' => $config[$className][$functionName]['content'],
            'user' => $user,
        ];
        
        echo view($config[$className][$functionName]['headerPath'], $config[$className][$functionName]['header']);
        echo view($config[$className][$functionName]['viewPath'], $data);
        //Po zalogowaniu zwraca błąd danych. Dlatego że vidok jest teraz generowany na nowych zasadach. 
        /*
            ZADANIA:
                1. dodaj model usera który będzie zwracał avatar, imie, nazwisko, role. (zasymuluj cookie'logged_before' = true)
                2. złap dane z pkt 1 i daj do vidoku. 
                3. napraw logowanie. (pewnie coś z generowaniem vidoku.)
        */

    }
    
    public function index() 
    {   
        $config = $this->config;
        if(isset($_COOKIE['logged_before'])) {
            $this->createView('Signin','welcomeback');
        }else {
            //$config = $config['']
            $this->createView('Signin','login');
        }
    }

    public function login() 
    {   
        if (isset($_POST['email']) && isset($_POST['password'])) {
            //If user has been in sign in and click "sign in" botton making POST reqest and this "if" catching that.

            //$request = service('request');
        
            //$security = \Config\Services::security();
            $session = \Config\Services::session();
            $validation =  \Config\Services::validation();
            $validation->setRuleGroup('signin');

            $data['filled'] = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ];
        
            $validation->run($data['filled'], 'signin');
            $validation->getErrors(); 
            $errors = $validation->getErrors();
            $data['errors'] = $errors; 
            
            if (count($errors) >= 1) {
                
                $this->createView('Signin','login', $data);
                
            }else {
                
                $model = new SigninModel();
                $user = $model->getUser($data['filled']);
                //var_dump($data['filled']['password']);
                //echo '<br>';
                //var_dump($user['password']); 
                if($user) {
                    if (password_verify($data['filled']['password'], $user['password'])) {
                        $newdata = [
                            'email'     => $data['filled']['email'],
                            'logged_in' => TRUE
                        ];
                        $session->set($newdata);
                        return redirect()->to(base_url().'/dashboard');
                    }else {
                        $errors = [
                            'email' => "Nieprawidłowy email lub hasło",
                            'password' => "Nieprawidłowy email lub hasło",
                        ];
                        $data['errors'] = $errors; 
                        $this->createView('Signin','login', $data);
                    }
                }else {
                    $errors = [
                        'email' => "Nieprawidłowy email lub hasło",
                        'password' => "Nieprawidłowy email lub hasło",
                    ];
                    $data['errors'] = $errors; 
                    $this->createView('Signin','login', $data);
                }
            }
        }else {
            $this->createView('Signin','login');
        } 
    }

    public function welcomeback() {
        if(isset($_COOKIE['logged_before'])) {
            echo 'welcome back';
            //delete_cookie('logged_before');
            echo '<a href="'.base_url().'/signin">Thats not me</a>'; 
            
            
            //var_dump($this->config);
        }else {
            return redirect()->to('signin');
        }
    }

    public function logout() 
    {
        $session = \Config\Services::session();
        
        if ($session->has('logged_in')) {
            $array_items = ['logged_in', 'email'];
            $session->remove($array_items);
            delete_cookie('ci_session');
            return redirect()->to('signin');
        }
    }

    public function back() 
    {
        //$session = \Config\Services::session();
        delete_cookie('logged_before');

        if (isset($_COOKIE['logged_before'])) {
            delete_cookie('logged_before');
            redirect()->to('back');
        }else {
            return redirect()->to('signin');
        }
    }
}
