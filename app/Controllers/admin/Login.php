<?php

namespace App\Controllers\admin;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Login extends BaseController
{
    var $session = array();

    public function __construct()
    {
        // Your constructor logic here
        // This will be executed every time an instance of the controller is created
        $this->session = \Config\Services::session();

        if ($this->session->has('user')) {
           $url = base_url('dish2o_admin/home');
                header("location:" . $url);
                exit;
        }

    }
    public function index(): string
    {
        
        $data = array();
        helper(['form']);
       
        return view('admin/login', $data);
    }

    public function validatelogin()
    {
        helper(['form']);
        helper('url');

        $data = array();
        $userModel = new UserModel();
        
        // If the form is submitted
        if ($this->request->getMethod(true) === 'POST') {
            // Load the Validation library
            $validation = \Config\Services::validation();

            // Define validation rules
            $validation->setRules([
                'username' => 'required|min_length[3]|',
                'password' => 'required|min_length[6]',
            ]);

            // Run the validation
            if ($validation->withRequest($this->request)->run()) {
                // Validation passed, process the login
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
               
                $user = $userModel->checkAdminUser($username);//$userModel->where('username', $username)->first();

               // print_r($user);
               // die;

                if ($user && MD5($password) == $user['password']) {
                    // Authentication successful, store user data in session or take other actions
                    unset($user['password']);
                    session()->set('user', $user);

                    return redirect()->to('dish2o_admin/home'); // Redirect to a dashboard page
                } else {
                    // Authentication failed

                    // Set a temporary session message
                    $session = session();
                    $session->setFlashdata('errorMessage', 'Inavlid username or password');

                    return redirect()->to('dish2o_admin/')->with('error', 'Invalid username or password');
                }
                //$url = base_url('dish2o_admin/home');
                //header("location:" . $url);
                //exit;
                // Send the response to perform the redirect
                /*$dataArr = array();
                $dataArr['menu'] = "Home";
                $dataArr['subMenu'] = "";
                $dataArr['viewPage'] = 'admin/home';

                return view('admin/layout', $dataArr);*/
            } else {
                // Validation failed, redisplay the login form with errors
                $errors = $validation->getErrors();
                print_r($errors);
                $data['validation'] = $validation;
                //die("validation failed");
                return view('admin/login', $data);
            }
        }
    }

    public function logout()
    {
        $this->session = \Config\Services::session();
        $this->session->destroy();
        $this->session->remove('user');

        $sessionUser = $this->session->get('user');
        print_r($sessionUser);
        die;

        return redirect()->to('dish2o_admin/login');
    }
}
