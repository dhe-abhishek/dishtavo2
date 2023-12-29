<?php

namespace App\Controllers\admin;

use App\Models\AdminModel;
use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index(): string
    {
        $data = array();
        helper(['form']);
        //$userModel = new AdminModel();
        // Load the form helper


        //die("nothing");

        // Load the login view
        return view('admin/login', $data);
    }

    public function validatelogin()
    {
        $data = array();
        $userModel = new AdminModel();
        helper(['form']);
        helper('url');
        // print "<pre>";
        //  print_r($this->request->getMethod(true));
        // die;
        // If the form is submitted
        if ($this->request->getMethod(true) === 'POST') {
            // Load the Validation library
            $validation = \Config\Services::validation();

            // Define validation rules
            $validation->setRules([
                'username' => 'required|alpha_numeric|min_length[3]|is_unique[users.username]',
                'password' => 'required|alpha_numeric|min_length[6]',
            ]);

            // print "valida";
            // print_r($validation->withRequest($this->request)->run());

            // Run the validation
            if ($validation->withRequest($this->request)->run()) {
                // Validation passed, process the login
                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');
                // die("in validation");
                // Perform your login logic here
                $user = $userModel->where('username', $username)->first();

                // print_r($user);
                // die;

                if ($user && MD5($password) == $user['password']) {
                    // Authentication successful, store user data in session or take other actions
                    // For example, you might want to store the user's ID in the session
                    //$this->session->set('user_id', $user['id']);
                    unset($user['password']);
                    session()->set('user', $user);

                    return redirect()->to('dish2o_admin/home'); // Redirect to a dashboard page
                } else {
                    // Authentication failed
                    return redirect()->to('dish2o_admin/')->with('error', 'Invalid username or password');
                }
                // For simplicity, let's assume a successful login for any username and password

                // Optionally, you can redirect to another page
                // return redirect()->to('dist2o_admin/home');
                //$this->response->setHeader('Location', base_url('admin/home'));

                // Optionally set the HTTP status code (e.g., 302 for temporary redirect)
                //$this->response->setStatusCode(302);

                // return redirect()->to('dish2o_admin/home');
                //exit;
                // redirect('/dish2o_admin/home')->send();


                $url = base_url('dish2o_admin/home');
                header("location:" . $url);
                exit;
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
                die("validation failed");
            }
        }
    }
}
