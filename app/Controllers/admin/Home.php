<?php

namespace App\Controllers\admin;

use App\Models\MenuModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
    var $roleMenu = array();
    
    public function __construct()
    {
        // Your constructor logic here
        // This will be executed every time an instance of the controller is created

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

        $sessionData = session()->get('user');
        //print_r($sessionData);
        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }
}
