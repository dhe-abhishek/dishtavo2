<?php

namespace App\Controllers\admin;


use App\Models\FacultyModel;
use App\Models\CollegeModel;
use App\Models\DesignationModel;
use App\Controllers\BaseController;

class Profile extends BaseController
{
    var $sessionUser = array();
    var $roleMenu = array();
    var $session = array();

    public function __construct()
    {
        // Your constructor logic here
        // This will be executed every time an instance of the controller is created
        $this->session = \Config\Services::session();
        //print_r($this->session->has('user'));
        //die;
        if (!$this->session->has('user')) {
           $url = base_url('dish2o_admin/login');
                header("location:" . $url);
                exit;
        }
        $this->sessionUser = $this->session->get('user');

    }
    public function index(): string
    {  
        $dataArr = array();
        $dataArr['menu'] = "";
        $dataArr['subMenu'] = "";
        $dataArr['viewPage'] = 'admin/profile';
        $dataArr['sessionUser'] =  $this->sessionUser;

        $facultyModel = new FacultyModel();
        $user_id = $this->sessionUser['id'];
      
        $dataArr['facultyDetails'] = $facultyModel->getFacultyCollegeDetails($user_id);
        $collegeModel = new CollegeModel();
        $dataArr['colleges'] = $collegeModel->findAll();

        $designationModel = new DesignationModel();
        $dataArr['designations'] = $designationModel->findAll();

        return view('admin/layout', $dataArr);
    }
}