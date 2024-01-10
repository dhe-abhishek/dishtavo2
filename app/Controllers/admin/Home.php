<?php

namespace App\Controllers\admin;

use App\Models\MenuModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
    var $sessionUser = array();
    var $roleMenu = array();
    var $session = array();
    
    public function __construct()
    {
        // Your constructor logic here
        // This will be executed every time an instance of the controller is created
        $this->session = \Config\Services::session();

        /* if (!$this->session->has('user')) {
           $url = base_url('dish2o_admin/login');
                header("location:" . $url);
                exit;
        } */

        $this->sessionUser = $this->session->get('user');

        $menu = new MenuModel();
        $roleId =1;//user logged in users role ID
        $this->roleMenu = $menu->getMenuForRole($roleId);
    }

    public function index(): string
    {
        $dataArr = array();
        $dataArr['menu'] = "Home";
        $dataArr['subMenu'] = "";
        $dataArr['viewPage'] = 'admin/home';
        $dataArr['sessionUser'] =  $this->sessionUser;

       
        //print_r($sessionData);
        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }
}
