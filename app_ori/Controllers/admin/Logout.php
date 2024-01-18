<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    var $session = array();

    public function index()
    {
        $this->session = \Config\Services::session();
        $this->session->destroy();
        $this->session->remove('user');

       // $sessionUser = $this->session->get('user');
      //  print_r($sessionUser);
       // die;

        return redirect()->to('dish2o_admin/login');
    }
}
