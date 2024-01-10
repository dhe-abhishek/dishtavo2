<?php

namespace App\Controllers\admin;

use App\Models\CollegeModel;
use App\Controllers\BaseController;

class College extends BaseController
{
    var $sessionUser = array();
    var $roleMenu = array();
    var $session = array();
    
    public function __construct()
    {
        // Your constructor logic here
        // This will be executed every time an instance of the controller is created
        $this->session = \Config\Services::session();

        if (!$this->session->has('user')) {
           $url = base_url('dish2o_admin/login');
                header("location:" . $url);
                exit;
        }

        $this->sessionUser = $this->session->get('user');

       // $menu = new MenuModel();
       // $roleId =1;//user logged in users role ID
        //$this->roleMenu = $menu->getMenuForRole($roleId);
    }

    public function index(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Colleges";
        $dataArr['menu'] = "College";
        $dataArr['subMenu'] = "List";
        $dataArr['viewPage'] = 'admin/college/list';

        $sessionData = session()->get('user');

        $collegeModel = new CollegeModel();

        //$colleges = $collegeModel->where('location', $location)->findAll();
        $dataArr['colleges'] = $collegeModel->orderBy('id', 'asc')->findAll();


        //print_r($sessionData);
        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    public function addnew(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Colleges";
        $dataArr['menu'] = "College";
        $dataArr['subMenu'] = "add";
        $dataArr['viewPage'] = 'admin/college/add';

        $sessionData = session()->get('user');
        //print_r($sessionData);
        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    public function save()
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Colleges";
        $dataArr['menu'] = "College";
        $dataArr['subMenu'] = "";
        $dataArr['successMsg'] = "";

        $collegeModel = new CollegeModel();

        $userData = array();
        helper(['form']);
        helper('url');

        // If the form is submitted
        if ($this->request->getMethod(true) === 'POST') {
            // Load the Validation library
            $validation = \Config\Services::validation();

            // Define validation rules
            $validation->setRules([
                'name' => 'required|alpha_numeric|min_length[3]',
            ]);


            // Run the validation
            if ($validation->withRequest($this->request)->run()) {
                $userData['name'] = $this->request->getPost('name');
                $userData['address'] = $this->request->getPost('address');
                $userData['email'] = $this->request->getPost('email');
                $userData['mobile'] = $this->request->getPost('mobile');
                $userData['is_active'] = 1;

                $collegeAdded = $collegeModel->save($userData);

                if ($collegeAdded) {
                    $dataArr['successMsg'] = "New college added successfully.";
                    $dataArr['viewPage'] = 'admin/college/list';
                    return redirect()->to('dish2o_admin/colleges'); // Redirect to a dashboard pa
                    exit;
                } else {
                    $dataArr['viewPage'] = 'admin/college/add';
                    //return redirect()->to('dish2o_admin/college/add')->with('error', 'Invalid username or password');
                }
            } else {
                $errors = $validation->getErrors();
                $dataArr['errors'] = $errors;

                //print_r( $errors);
                $dataArr['viewPage'] = 'admin/college/add';
            }
        }

        return view('admin/layout', $dataArr);
    }

    public function edit(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Colleges";
        $dataArr['menu'] = "College";
        $dataArr['subMenu'] = "edit";
        $dataArr['viewPage'] = 'admin/college/edit';

        $sessionData = session()->get('user');
        $collegeId = $this->request->getPost('college_id');

        $collegeModel = new CollegeModel();
        $dataArr['collegeDetails'] = $collegeModel->where('id', $collegeId)->findAll()[0];

        //print_r($dataArr['collegeDetails']);

        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    public function update()
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Colleges";
        $dataArr['menu'] = "College";
        $dataArr['subMenu'] = "";
        $dataArr['successMsg'] = "";

        $collegeModel = new CollegeModel();

        $userData = array();
        helper(['form']);
        helper('url');

        // If the form is submitted
        if ($this->request->getMethod(true) === 'POST') {
            // Load the Validation library
            $validation = \Config\Services::validation();

            // Define validation rules
            $validation->setRules([
                'name' => 'required|alpha_numeric|min_length[3]',
            ]);


            // Run the validation
            if ($validation->withRequest($this->request)->run()) {
                $collegeId = $this->request->getPost('college_id');

                $userData['name'] = $this->request->getPost('name');
                $userData['address'] = $this->request->getPost('address');
                $userData['email'] = $this->request->getPost('email');
                $userData['mobile'] = $this->request->getPost('mobile');
                $userData['is_active'] = 1;

                $collegeAdded = $collegeModel->update($collegeId, $userData);

                if ($collegeAdded) {
                    $dataArr['successMsg'] = "College updated successfully.";
                    $dataArr['viewPage'] = 'admin/college/list';
                    // Set a temporary session message
                    $session = session();
                    $session->setFlashdata('success', 'College updated successfully');

                    return redirect()->to('dish2o_admin/colleges'); // Redirect to a dashboard pa
                    exit;
                } else {
                    $dataArr['viewPage'] = 'admin/college/edit';
                    //return redirect()->to('dish2o_admin/college/add')->with('error', 'Invalid username or password');
                }
            } else {
                $errors = $validation->getErrors();
                $dataArr['errors'] = $errors;

                //print_r( $errors);
                $dataArr['viewPage'] = 'admin/college/edit';
            }
        }

        return view('admin/layout', $dataArr);
    }
}
