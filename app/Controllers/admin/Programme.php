<?php
/*
Abhishek Gudekar
*/ 
namespace App\Controllers\admin;

use App\Models\ProgrammeModel;
use App\Controllers\BaseController;

class Programme extends BaseController
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
        $dataArr['pageTitle'] = "Manage Programmes";
        $dataArr['menu'] = "Programme";
        $dataArr['subMenu'] = "List";
        $dataArr['viewPage'] = 'admin/programme/list';
        $dataArr['sessionUser'] =  $this->sessionUser;

      

        $programmeModel = new ProgrammeModel();

        //$colleges = $collegeModel->where('location', $location)->findAll();
        $dataArr['programmes'] = $programmeModel->orderBy('id', 'asc')->findAll();


        //print_r($sessionData);
        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    public function addnew(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Programmes";
        $dataArr['menu'] = "Programme";
        $dataArr['subMenu'] = "add";
        $dataArr['viewPage'] = 'admin/programme/add';
        $dataArr['sessionUser'] =  $this->sessionUser;

        $sessionData = session()->get('user');
        //print_r($sessionData);
        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    public function save()
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Programmes";
        $dataArr['menu'] = "Programme";
        $dataArr['subMenu'] = "";
        $dataArr['successMsg'] = "";
        $dataArr['sessionUser'] =  $this->sessionUser;

        $programmeModel = new ProgrammeModel();

        $userData = array();
        helper(['form']);
        helper('url');

        // If the form is submitted
        if ($this->request->getMethod(true) === 'POST') {
            // Load the Validation library
            $validation = \Config\Services::validation();

            // Define validation rules
            $validation->setRules([
                'name' => 'required',
            ]);


            // Run the validation
            if ($validation->withRequest($this->request)->run()) {
                $userData['type'] = $this->request->getPost('type');
                $userData['name'] = $this->request->getPost('name');
                $userData['position'] = $this->request->getPost('position');
                $userData['created_by'] = 1;

                $programmeAdded = $programmeModel->save($userData);

                if ($programmeAdded) {
                    $dataArr['successMsg'] = "New programme added successfully.";
                    $dataArr['viewPage'] = 'admin/programme/list';
                    return redirect()->to('dish2o_admin/programmes'); // Redirect to a dashboard pa
                    exit;
                } else {
                    $dataArr['viewPage'] = 'admin/programme/add';
                    //return redirect()->to('dish2o_admin/college/add')->with('error', 'Invalid username or password');
                }
            } else {
                $errors = $validation->getErrors();
                $dataArr['errors'] = $errors;

                //print_r( $errors);
                $dataArr['viewPage'] = 'admin/programme/add';
            }
        }

        return view('admin/layout', $dataArr);
    }

    public function edit(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Programmes";
        $dataArr['menu'] = "Programme";
        $dataArr['subMenu'] = "edit";
        $dataArr['viewPage'] = 'admin/programme/edit';
        $dataArr['sessionUser'] =  $this->sessionUser;

        $sessionData = session()->get('user');
        $programmeId = $this->request->getPost('programme_id');

        $programmeModel = new ProgrammeModel();
        $dataArr['programmeDetails'] = $programmeModel->where('id', $programmeId)->findAll()[0];

        //print_r($dataArr['collegeDetails']);

        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    public function update()
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Programmes";
        $dataArr['menu'] = "Programme";
        $dataArr['subMenu'] = "";
        $dataArr['successMsg'] = "";
        $dataArr['sessionUser'] =  $this->sessionUser;

        $programmeModel = new ProgrammeModel();

        $userData = array();
        helper(['form']);
        helper('url');

        // If the form is submitted
         if ($this->request->getMethod(true) === 'POST') {
            // Load the Validation library
            $validation = \Config\Services::validation();

            // Define validation rules
            $validation->setRules([
                'name' => 'required',
            ]);

            
            // Run the validation
            if ($validation->withRequest($this->request)->run()) {
                $programmeId = $this->request->getPost('programme_id');

                $userData['type'] = $this->request->getPost('type');
                $userData['name'] = $this->request->getPost('name');
                $userData['position'] = $this->request->getPost('position');
                $userData['created_by'] = 1;

               
                //$programmeAdded = $programmeModel->update($userData, ['programme_id' => $programmeId]);
                $programmeAdded = $programmeModel->update($programmeId, $userData);

                if ($programmeAdded) {
                    $dataArr['successMsg'] = "Programme updated successfully.";
                    $dataArr['viewPage'] = 'admin/programme/list';
                    // Set a temporary session message
                    $session = session();
                    $session->setFlashdata('success', 'Programme updated successfully');

                    return redirect()->to('dish2o_admin/programmes'); // Redirect to a dashboard pa
                    exit;
                } else {
                    $dataArr['viewPage'] = 'admin/programme/edit';
                    //return redirect()->to('dish2o_admin/college/add')->with('error', 'Invalid username or password');
                }
             } else {
                $errors = $validation->getErrors();
                $dataArr['errors'] = $errors;

                //print_r( $errors);
                $dataArr['viewPage'] = 'admin/programme/edit';
            }
        } 

        return view('admin/layout', $dataArr);
    }
}
