<?php
/* Abhishek G. */

namespace App\Controllers\admin;

use Config\App;
use App\Models\FacultyModel;
use App\Models\CollegeModel;
use App\Models\DesignationModel;
use App\Models\UserModel;
use App\Models\UserRoleModel;
use App\Controllers\BaseController;

class Faculty extends BaseController
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
        $dataArr['pageTitle'] = "Manage Faculty";
        $dataArr['menu'] = "Faculty";
        $dataArr['subMenu'] = "List";
        $dataArr['viewPage'] = 'admin/faculty/list';
        $dataArr['sessionUser'] =  $this->sessionUser;



        $facultyModel = new FacultyModel();
        $dataArr['allFacultyDetails'] = $facultyModel->getAllFacultyDetails();

        //print "<pre>";
        //print_r($dataArr);
        //die();
        return view('admin/layout', $dataArr);
    }

    public function addnew(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Faculty";
        $dataArr['menu'] = "Faculty";
        $dataArr['subMenu'] = "add";
        $dataArr['viewPage'] = 'admin/faculty/add';
        $dataArr['sessionUser'] =  $this->sessionUser;



        $collegeModel = new CollegeModel();
        $dataArr['colleges'] = $collegeModel->findAll();

        $designationModel = new DesignationModel();
        $dataArr['designations'] = $designationModel->findAll();

        return view('admin/layout', $dataArr);
    }



    public function save()
    {

        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Faculty";
        $dataArr['menu'] = "Faculty";
        $dataArr['subMenu'] = "";
        $dataArr['successMsg'] = "";
        $dataArr['sessionUser'] =  $this->sessionUser;


        $userModel = new UserModel();
        $facultyModel = new FacultyModel();
        $collegeModel = new CollegeModel();
        $userroleModel = new UserRoleModel();
        $designationModel = new DesignationModel();

        $dataArr['colleges'] = $collegeModel->findAll();
        $dataArr['designations'] = $designationModel->findAll();
        $userData = array();
        helper(['form']);
        helper('url');

        // If the form is submitted
        if ($this->request->getMethod(true) === 'POST') {
            // Load the Validation library
            $validation = \Config\Services::validation();

            // Define validation rules
            $validation->setRules([
                'username' => 'required',
                'password' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'salutation' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'cpassword' => [
                    'label' => 'Confirm Password',
                    'rules' => 'required|matches[password]'
                ],
                'college_id' => 'required',
                'current_appointment_type' => 'required',
                'current_designation_id' => 'required',
                'from_date' => 'required'
            ]);

            //print_r($this->request->getPost());
            // Run the validation
            if ($validation->withRequest($this->request)->run()) {
                $userData['username'] = $this->request->getPost('username');
                $userData['password'] = $this->request->getPost('password');
                $userData['email'] = $this->request->getPost('email');
                $userData['mobile'] = $this->request->getPost('mobile');
                $userData['salutation'] = $this->request->getPost('salutation');
                $userData['firstname'] = $this->request->getPost('firstname');
                $userData['lastname'] = $this->request->getPost('lastname');
                $userData['is_approved'] = 1;
                $userData['is_active'] = 1;

                $userAdded = $userModel->save($userData);

                if ($userAdded) {

                    //echo $userModel->getInsertID();
                    //die();
                    $userRoleData['user_id'] = $userModel->getInsertID();
                    $userRoleData['role_id'] = 5;
                    $userProfessionalData['user_id'] = $userModel->getInsertID();
                    $userProfessionalData['college_id'] = $this->request->getPost('college_id');
                    $userProfessionalData['current_appointment_type'] = $this->request->getPost('current_appointment_type');
                    $userProfessionalData['current_designation_id'] = $this->request->getPost('current_designation_id');
                    $userProfessionalData['from_date'] = $this->request->getPost('from_date');

                    $userroleAdded = $userroleModel->save($userRoleData);
                    $userprofessionaldataAdded = $facultyModel->save($userProfessionalData);

                    if ($userprofessionaldataAdded  && $userroleAdded) {
                        $dataArr['successMsg'] = "User Registered successfully.";
                        $dataArr['viewPage'] = '/dish2o_admin/faculties';
                        return redirect()->to('/dish2o_admin/faculties/addnew'); // Redirect to a dashboard pa
                        exit;
                    } else {
                        $dataArr['viewPage'] = 'admin/faculty/add';
                    }
                } else {
                    $dataArr['viewPage'] = 'admin/faculty/add';
                    //return redirect()->to('dish2o_admin/college/add')->with('error', 'Invalid username or password');
                }
            } else {
                $errors = $validation->getErrors();
                $dataArr['errors'] = $errors;

                //print_r( $errors);
                $dataArr['viewPage'] = 'admin/faculty/add';
            }
        }

        return view('admin/layout', $dataArr);
    }

    public function fetchfacultypersonalDetails()
    {
        $user_id = $this->request->getPost('user_id');
        $userModel = new UserModel();
        $data = $userModel->where('id', $user_id)->find();
        //print $user_id;
        //die();
        echo json_encode($data); // Return a JSON response
    }

    public function update()
    {

        $userModel = new UserModel();
        $userData = array();
        $config = config('App');
        $user_id = $this->request->getPost('user_id');
        $userData['salutation'] = $this->request->getPost('salutation');
        $userData['firstname'] = $this->request->getPost('firstname');
        $userData['lastname'] = $this->request->getPost('lastname');
        $userData['mobile'] = $this->request->getPost('mobile');
        $userData['email'] = $this->request->getPost('email');
        $file = $this->request->getFile('photo');

        // Validation
        $input = $this->validate([
            'photo' => 'uploaded[photo]|max_size[photo,1024]|ext_in[photo,jpeg,jpg,png],'
        ]);
        if (!$input) { // Not valid
            $dataArr['errorMsg'] = "Upload the file";
            echo json_encode($dataArr);
        } else { // Valid

            if ($file = $this->request->getFile('photo')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Get file name and extension
                    $name =  $this->request->getPost('salutation')  . $this->request->getPost('firstname') . "_" . $this->request->getPost('lastname') . "." . $file->getClientExtension();  //Give random name to file
                    $userData['photo'] = $name;
                    //$ext = $file->getClientExtension();

                    // Fetch uploadURL from app.php file
                    $uploadProfileURL = config(App::class)->uploadprofilePath;

                    $uploadProfileURL = $uploadProfileURL . "/";

                    // Desired folder structure
                    if (!file_exists($uploadProfileURL)) { // Use file_exists() for general checks
                        mkdir($uploadProfileURL, 0777, true);
                    } else {
                        // Folder already exists, handle accordingly (e.g., notify user or proceed with other actions)
                    }

                    // File path to display preview
                    $file->move($uploadProfileURL, $name);
                    $filepath = $uploadProfileURL . $name;
                    chmod($filepath, 0777);
                    //print($filepath);

                    $profileUpdated =  $userModel->update($user_id, $userData);
                    if ($profileUpdated) {
                        $message['successMsg'] = "Profile updated successfully.";
                        $message['photoPath'] = base_url('dish2o_admin/') . 'faculties/resource?photo=' . $name;
                        echo json_encode($message);
                    } else {
                        $message['errorMsg'] = "Failed to update successfully.";
                        echo json_encode($message);
                    }
                }
            }
        }
        //print $user_id;
        //die();

    }

    public function resource()
    {
        $filename = $this->request->getGet('photo');
        $filepath = WRITEPATH . 'uploads/profile/' . $filename;

        $mime = mime_content_type($filepath);
        header('Content-Length: ' . filesize($filepath));
        header("Content-Type: $mime");
        header('Content-Disposition: inline; filename="' . $filepath . '";');
        readfile($filepath);
        exit();

    }

    public function deleteProfile()
    {
        $userModel = new UserModel();

        $user_id = $this->request->getPost('user_id');
        $userData['deleted_at'] = date("Y-m-d");
        $profileDeleted =  $userModel->update($user_id, $userData);

        if ($profileDeleted) {
            $dataArr['successMsg'] = "Profile deleted successfully.";
        } else {
            $dataArr['errorsMsg'] = "Cannot delete Profile!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }

    public function addNewCollege()
    {

        $facultyModel = new FacultyModel();
        $userData = array();

        $userData['user_id'] = $this->sessionUser['id'];
        $userData['college_id'] = $this->request->getPost('college_id');
        $userData['appointment_type'] = $this->request->getPost('appointment_type');
        $userData['current_designation_id'] = $this->request->getPost('current_designation_id');
        $userData['from_date'] = $this->request->getPost('from_date');
        $userData['to_date'] = $this->request->getPost('to_date');
        $collegeAdded =  $facultyModel->save($userData);
        if ($collegeAdded) {
            $message['successMsg'] = "College added successfully.";
            echo json_encode($message);
        } else {
            $message['errorMsg'] = "College added successfully.";
            echo json_encode($message);
        }
        //print $user_id;
        //die();

    }


    public function deleteFacultyCollege()
    {
        $facultyModel = new FacultyModel();

        $faculty_id = $this->request->getPost('faculty_id');
        $facultycollegeDeleted =  $facultyModel->delete($faculty_id, true);
        //print($facultyModel->getLastQuery());
        //die;
        if ($facultycollegeDeleted) {
            $dataArr['successMsg'] = "Faculty College deleted successfully.";
        } else {
            $dataArr['errorsMsg'] = "Cannot delete College!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }

    /*
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
    } */
}
