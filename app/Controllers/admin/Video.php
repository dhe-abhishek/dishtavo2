<?php
/* Abhishek G. */

namespace App\Controllers\admin;

use App\Models\FacultyModel;
use App\Models\LanguageModel;
use App\Models\VideoModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Video extends BaseController
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
        $dataArr['pageTitle'] = "Manage Video";
        $dataArr['menu'] = "Video";
        $dataArr['subMenu'] = "List";
        $dataArr['viewPage'] = 'admin/video/list';
        $dataArr['sessionUser'] =  $this->sessionUser;
      

        $videoModel = new VideoModel();
        $facultyModel = new FacultyModel();
        $languageModel = new LanguageModel();
        $dataArr['allVideoDetails'] = $videoModel->getAllVideoDetails();
        $dataArr['allFacultyNames'] = $facultyModel->getAllFacultyNames();
        $dataArr['languages'] = $languageModel->findAll();
        //print "<pre>";
        //print_r($dataArr);
        //die();
        return view('admin/layout', $dataArr);
    } 

    public function addnew(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Video";
        $dataArr['menu'] = "Video";
        $dataArr['subMenu'] = "add";
        $dataArr['viewPage'] = 'admin/video/add';
        $dataArr['sessionUser'] =  $this->sessionUser;
      

        $facultyModel = new FacultyModel();
        $languageModel = new LanguageModel();

        $dataArr['allFacultyNames'] = $facultyModel->getAllFacultyNames();
        $dataArr['languages'] = $languageModel->findAll();
        //print "<pre>";
        //print_r($dataArr);
        //die();
        return view('admin/layout', $dataArr);
    }



    public function save()
    {

        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Video";
        $dataArr['menu'] = "Video";
        $dataArr['subMenu'] = "";
        $dataArr['successMsg'] = "";
        $dataArr['sessionUser'] =  $this->sessionUser;
        $videoModel = new VideoModel();
        $videoData = array();
        helper(['form']);
        helper('url');

        // If the form is submitted
        if ($this->request->getMethod(true) === 'POST') {
            // Load the Validation library
            $validation = \Config\Services::validation();

            // Define validation rules
            $validation->setRules([
                'faculty' => 'required',
                'title' => 'required',
                'url' => 'required',
                'language' => 'required',
            ]);

            //print_r($this->request->getPost());
            // Run the validation
            if ($validation->withRequest($this->request)->run()) {
                $videoData['user_id'] = $this->request->getPost('faculty');
                $videoData['name'] = $this->request->getPost('title');
                $videoData['video_url'] = $this->request->getPost('url');
                $videoData['language_id'] = $this->request->getPost('language');
                $videoData['created_by'] = 1;
                $videoData['is_approved'] = 1;
                $videoData['is_active'] = 1;

                $videoAdded =  $videoModel->save($videoData);

                if ($videoAdded) {
                    $session = session();
                    $session->setFlashdata('success', 'Video Added successfully');
                    return redirect()->to('/dish2o_admin/videos/addnew'); // Redirect to a dashboard page
                    exit;
                } else {
                    $dataArr['viewPage'] = 'admin/video/add';
                }
            }
            return view('admin/layout', $dataArr);
        }
    }

    public function fetchvideoDetails()
    {
        $id = $this->request->getPost('id');
        $videoModel = new VideoModel();
        $data = $videoModel->where('id', $id)->find();
        //print $user_id;
        //die();
        echo json_encode($data); // Return a JSON response
    }

    /*  public function fetchfacultypersonalDetails()
    {
        $user_id = $this->request->getPost('user_id');
        $userModel = new UserModel();
        $data = $userModel->where('id', $user_id)->find();
        //print $user_id;
        //die();
        echo json_encode($data); // Return a JSON response
    } */

     public function update()
    {

        $videoModel = new VideoModel();
        $videoData = array();
        $id = $this->request->getPost('video_id');
        $videoData['user_id'] = $this->request->getPost('faculty');
        $videoData['name'] = $this->request->getPost('title');
        $videoData['video_url'] = $this->request->getPost('url');
        $videoData['language_id'] = $this->request->getPost('language');
        $videodetailsUpdated =  $videoModel->update($id,$videoData);
        if ($videodetailsUpdated) {
            $message['successMsg'] = "Video details updated successfully.";
            echo json_encode($message);
        } else {
            $message['errorMsg'] = "Failed to update successfully.";
            echo json_encode($message);
        }
        //print $user_id;
        //die();

    }
 
     public function deletevideo()
    {
        $videoModel = new VideoModel();
    
        $video_id = $this->request->getPost('id');

        $videoData['deleted_at'] =date("Y-m-d");
        $videoDeleted =  $videoModel->update($video_id,$videoData);
        
        if ($videoDeleted) {
            $dataArr['successMsg'] = "Video deleted successfully.";
            
        } else {
            $dataArr['errorsMsg'] = "Cannot delete Video!";
           
        }

        echo json_encode($dataArr); // Return a JSON response
    }
     
}
