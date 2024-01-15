<?php

namespace App\Controllers\admin;

use Config\App;
use App\Models\ProgrammeCourseModel;
use App\Models\CourseModel;
use App\Models\ProgrammeModel;
use App\Models\SubjectModel;
use App\Models\CoursecategoryModel;
use App\Models\FacultyModel;
use App\Models\ModuleModel;
use App\Models\ProgrammeCourseUnitModuleModel;
use App\Models\ModuleDocLogModel;
use App\Models\ProgrammeCourseUnitModel;
use App\Models\UEALogModel;
use App\Models\UserModel;

use App\Controllers\BaseController;

class ProgrammeCourse extends BaseController
{
    public function index(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Courses";
        $dataArr['menu'] = "Course";
        $dataArr['subMenu'] = "List";
        $dataArr['viewPage'] = 'admin/Programmecourse/list';

        $sessionData = session()->get('user');

        $programmeCourseModel = new ProgrammeCourseModel();

        //$colleges = $collegeModel->where('location', $location)->findAll();
        $dataArr['programmecourses'] = $programmeCourseModel->getProgramCourses(); //$programmeCourseModel->orderBy('id', 'asc')->findAll();
        $lastQuery = $programmeCourseModel->getLastQuery();
        //print "<pre>";
        //print $lastQuery;
        //print_r($dataArr['programmecourses']);
        //die;
        //print_r($sessionData);
        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    public function addnew(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Courses";
        $dataArr['menu'] = "Course";
        $dataArr['subMenu'] = "Add";
        $dataArr['viewPage'] = 'admin/ProgrammeCourse/add';

        $sessionData = session()->get('user');
        $programmeModel = new ProgrammeModel();
        $dataArr['programmes'] = $programmeModel->orderBy('position', 'asc')->findAll();

        $subjectModel = new SubjectModel();
        $dataArr['subjects'] = $subjectModel->orderBy('id', 'asc')->findAll();

        $coursecategoryModel = new CoursecategoryModel();
        $dataArr['coursecategory'] = $coursecategoryModel->orderBy('id', 'asc')->findAll();

        $courseModel = new CourseModel();
        $dataArr['courses'] = $courseModel->orderBy('id', 'asc')->findAll();
        //print "<pre>";
        //print_r(  $dataArr['programmes']);

        //print_r($sessionData);
        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    public function save()
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Courses";
        $dataArr['menu'] = "Course";
        $dataArr['subMenu'] = "";
        $dataArr['successMsg'] = "";

        $programmeCourseModel = new ProgrammeCourseModel();

        //$colleges = $collegeModel->where('location', $location)->findAll();
        $dataArr['programmecourses'] = $programmeCourseModel->orderBy('id', 'asc')->findAll();
        //print "<pre>";
        //print_r($dataArr['courses']);
        // die;

        $courseModel = new CourseModel();
        $programmeModel = new ProgrammeModel();
        $dataArr['programmes'] = $programmeModel->orderBy('position', 'asc')->findAll();

        $subjectModel = new SubjectModel();
        $dataArr['subjects'] = $subjectModel->orderBy('id', 'asc')->findAll();

        $coursecategoryModel = new CoursecategoryModel();
        $dataArr['coursecategory'] = $coursecategoryModel->orderBy('id', 'asc')->findAll();

        $courseModel = new CourseModel();
        $dataArr['courses'] = $courseModel->orderBy('id', 'asc')->findAll();
        $userData = array();
        helper(['form']);
        helper('url');

        // If the form is submitted
        if ($this->request->getMethod(true) === 'POST') {
            // Load the Validation library
            $validation = \Config\Services::validation();

            // Define validation rules
            /*    $validation->setRules([
                'name' => 'required|alpha_numeric|min_length[3]',
            ]); */


            // Run the validation
            // if ($validation->withRequest($this->request)->run()) {
            $userData['program_id'] = $this->request->getPost('sel_stream');
            $userData['subject_id'] = $this->request->getPost('sel_sub');
            $userData['programme_type'] = $this->request->getPost('sel_program');
            $userData['semester'] = $this->request->getPost('sel_sem');
            $userData['effective_from_year'] = $this->request->getPost('year');
            $userData['no_of_credits'] = $this->request->getPost('credits');
            $userData['code'] = $this->request->getPost('ccode');
            $userData['course_type_id'] = $this->request->getPost('ctype');
            $userData['course_id'] = $this->request->getPost('cname');
            $userData['course_prerequisite'] = $this->request->getPost('cPrerequisuite');
            $userData['objectives'] = $this->request->getPost('cOjectives');
            //$userData['course_id'] = $this->request->getPost('cname');

            print_r($userData);
            //die;

            //$userData['is_active'] = 1;

            $courseAdded = $programmeCourseModel->save($userData);
            $lastQuery = $programmeCourseModel->getLastQuery();
            print $lastQuery;

            //die;

            if ($courseAdded) {
                $dataArr['successMsg'] = "New course added successfully.";
                $dataArr['viewPage'] = 'admin/Programmecourse/list';
                return redirect()->to('dish2o_admin/Programmecourse'); // Redirect to a dashboard pa
                exit;
            } else {
                $dataArr['viewPage'] = 'admin/Programmecourse/add';
                //return redirect()->to('dish2o_admin/college/add')->with('error', 'Invalid username or password');
            }
            /* } else {
                $errors = $validation->getErrors();
                $dataArr['errors'] = $errors;

                print_r($errors);
                $dataArr['viewPage'] = 'admin/course/add';
            } */
        }

        return view('admin/layout', $dataArr);
    }


    /*
     * Function to retrieve Quad Data
     * Author: Abhishek G.
     */
    public function fetchquadData(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Quad-Data";
        $dataArr['menu'] = "Quad-Data";
        $dataArr['subMenu'] = "List";
        $dataArr['viewPage'] = 'admin/Programmecourse/quaddata';

        $sessionData = session()->get('user');


        $programmeCourseModel = new ProgrammeCourseModel();
        $facultyModel = new FacultyModel();
        $programmecourse_id = $this->request->getGet('programmecourse_id');
        //print $programmecourse_id;
        //die;
        $dataArr['courseDetails'] = $programmeCourseModel->getProgramCourseDetails($programmecourse_id);
        $dataArr['quadData'] = $programmeCourseModel->getProgramCourseQuaddata($programmecourse_id);
        //$dataArr['template'] = $programmeCourseModel->getProgramCourseTemplate($programmecourse_id);
        $dataArr['faculty'] = $facultyModel->getAllFacultyNames();

        // $lastQuery = $programmeCourseModel->getLastQuery();
        //print "<pre>";
        //print $lastQuery;
        //print_r($dataArr['quadData']);
        //die;

        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    /* Abhishek G 
    * Function to assign Faculty to Module
    */
    public function assignFacultyToModule()
    {
        $dataArr = array();
      

        $sessionData = session()->get('user');

        $ProgrammeCourseUnitModuleModel = new ProgrammeCourseUnitModuleModel();
        $user = $this->request->getPost('user_id');
        $module_id = $this->request->getPost('module_id');
        $dataArr['user_id'] = $this->request->getPost('user_id');
        $programme_course_unit_module_id = $this->request->getPost('programme_course_unit_module_id');
        $dataArr['created_by'] = 1;

        $userModel = new UserModel();
        $dataArr['user'] = $userModel->where('id', $user )->select('salutation,firstname,lastname')->first();
        $assignFacultyToModule =  $ProgrammeCourseUnitModuleModel->update($programme_course_unit_module_id, $dataArr);
        if ($assignFacultyToModule) {
            $dataArr['successMsg'] = "Faculty assigned to Module successfully.";

        } else {
            $dataArr['errorMsg'] = "Cannot assign Faculty to Module.";
        }
        echo json_encode($dataArr);
    }



    /* 
    Function to Detach Faculty from Module
    Abhishek G
    */
    public function detachFacultyToModule()
    {

        helper('filesystem');
        $dataArr = array();
        $ueaArr = array();
        $programmecourseunitmoduleModel = new ProgrammeCourseUnitModuleModel();
        
        $programme_course_unit_module_id = $this->request->getPost('programme_course_unit_module_id');

        $ueaArr['user_id'] = 0;
        $ueaArr['created_by'] = 0;
     
        $facultyDetached =  $programmecourseunitmoduleModel->update($programme_course_unit_module_id, $ueaArr);
      

        if ($facultyDetached) {
            $dataArr['successMsg'] = "Faculty detached from Module Successfully!";
        } else {
            $dataArr['errorsMsg'] = "Cannot detach faculty from Module!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }



    /* 
    Function to upload quad data
    Abhishek G
    */
    public function uploadQuadData()
    {
        $dataArr = array();
        $quadData = array();

        $config = config('App');
        $sessionData = session()->get('user');

        $moduleModel = new ModuleModel();
        $moduledoclogModel = new ModuleDocLogModel();

        $file = $this->request->getFile('filename');

        $quadData['module_id'] = $this->request->getPost('module_id');
        $quadData['user_id'] = 1;
        $quadData['doc_type'] = $file->getMimeType();

        $module_id = $this->request->getPost('module_id');
        $datafile = $this->request->getPost('datafile');

        //print "<pre>";
        //print_r($quadData);
        //print_r($dataArr);
        //print_r($module_id);
        //print($datafile);
        //die;


        // Validation

        $input = $this->validate([
            'filename' => 'uploaded[filename]|max_size[filename,1024]|ext_in[filename,docx,pdf],'
        ]);

        if (!$input) { // Not valid
            $dataArr['errorMsg'] = "Upload the file";
            echo json_encode($dataArr);
        } else { // Valid

            if ($file = $this->request->getFile('filename')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Get file name and extension
                    $name =  $this->request->getPost('module_id') . "_" . "Q-II-" . $datafile . "." . $file->getClientExtension();  //Give random name to file
                    $quadData['filename'] = $name;
                    //$ext = $file->getClientExtension();

                    // Fetch uploadURL from app.php file
                    $uploadURL = config(App::class)->uploadquadDataPath;
                    $quadDataURL = config(App::class)->quadDataURL;
                    // Desired folder structure
                    $target_URL = $uploadURL . "/Mod_" . $module_id . "/";
                    if (!file_exists($target_URL)) { // Use file_exists() for general checks
                        mkdir($target_URL, 0777, true);
                    } else {
                        // Folder already exists, handle accordingly (e.g., notify user or proceed with other actions)
                    }

                    // File path to display preview

                    $file->move($target_URL, $name);
                    $filepath = $target_URL . $name;
                    chmod($filepath, 0777);
                    //print $filepath;


                    $dataArr[$datafile] = $name;

                    $assignFacultyToModule =  $moduleModel->update($module_id, $dataArr);

                    $moduledoclog = $moduledoclogModel->save($quadData);
                    if ($assignFacultyToModule && $moduledoclog) {
                        $dataArr['successMsg'] = "Uploaded Successfully!" . " " . $filepath;
                        //$this->response->setHeader('Content-Type', get_mime_by_extension($name));
                        $dataArr['showfile'] = $this->response->download($filepath, $name);

                        $dataArr['transcript'] = "
                        <a href='" . base_url('dish2o_admin/Programmecourse/showquadfile') . "?module_id=" . $module_id . "&filename=" . $file->getName() . "' target='_blank' >Transcript</a>
                    ";
                    } else {

                        $dataArr['errorMsg'] = "File not uploaded.";
                    }
                }
            }
        }

        echo json_encode($dataArr);
    }


    /* 
    Function to Display QuadFile
    Abhishek G
    */
    public function showQuadFile()
    {
        helper("filesystem");
        $module_id = $this->request->getGet('module_id');
        $filename = $this->request->getGet('filename');

        $path = WRITEPATH . 'uploads/quadData/Mod_' . $module_id . '/';
        //print_r($path);
        //die;
        //$filename = '1_Q-II-Transcript.pdf';

        $fullpath = $path . $filename;
        $file = new \CodeIgniter\Files\File($fullpath, true);
        $binary = readfile($fullpath);
        return $this->response
            ->setHeader('Content-Type', $file->getMimeType())
            ->setHeader('Content-disposition', 'inline; filename="' . $file->getBasename() . '"')
            ->setStatusCode(200)
            ->setBody($binary);
    }


    /*
     * Function to retrieve UEA
     * Author: Abhishek G.
     */
    public function fetchuea(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage UEA";
        $dataArr['menu'] = "UEA";
        $dataArr['subMenu'] = "List";
        $dataArr['viewPage'] = 'admin/Programmecourse/uea';

        $sessionData = session()->get('user');

        $programmeCourseModel = new ProgrammeCourseModel();

        $programmecourse_id = $this->request->getGet('programmecourse_id');

        $dataArr['courseDetails'] = $programmeCourseModel->getProgramCourseDetails($programmecourse_id);
        $dataArr['allUnits'] = $programmeCourseModel->fetchProgrammeCourseUnits($programmecourse_id);
        return view('admin/layout', $dataArr);
    }




    /* 
    Function to upload Unit End Assessment
    Abhishek G
    */
    public function uploadUEA()
    {
        $dataArr = array();
        $ueaData = array();

        $config = config('App');
        $sessionData = session()->get('user');

        $programmecourseunitModel = new ProgrammeCourseUnitModel();


        $file = $this->request->getFile('filename');
        $unit_id = $this->request->getPost('unit_id');
        $programme_course_unit_id = $this->request->getPost('programme_course_unit_id');



        //print "<pre>";
        //print_r($file);
        //print($unit_id);
        //print($programme_course_unit_id);
        //die;

        // Validation

        $input = $this->validate([
            'filename' => 'uploaded[filename]|max_size[filename,1024]|ext_in[filename,docx,pdf],'
        ]);

        if (!$input) { // Not valid
            $dataArr['errorMsg'] = "Upload the file";
            echo json_encode($dataArr);
        } else { // Valid

            if ($file = $this->request->getFile('filename')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Get file name and extension
                    $name =  'PCU_' . $programme_course_unit_id . "." . $file->getClientExtension();  //Give random name to file
                    $ueaData['filename'] = $name;
                    //$ext = $file->getClientExtension();

                    // Fetch uploadURL from app.php file
                    $uploadURL = config(App::class)->uploadueaDataPath;
                    $quadDataURL = config(App::class)->quadDataURL;
                    // Desired folder structure
                    $target_URL = $uploadURL;
                    if (!file_exists($target_URL)) { // Use file_exists() for general checks
                        mkdir($target_URL, 0777, true);
                    } else {
                        // Folder already exists, handle accordingly (e.g., notify user or proceed with other actions)
                    }

                    // File path to display preview

                    $file->move($target_URL, $name);
                    $filepath = $target_URL . "/" . $name;
                    chmod($filepath, 0777);
                    //print $filepath;


                    $dataArr['uea'] = $name;
                    $dataArr['uea_uploaded_by'] = 1;
                    $assignUEAToUnit =  $programmecourseunitModel->update($programme_course_unit_id, $dataArr);


                    if ($assignUEAToUnit) {
                        $dataArr['successMsg'] = "Uploaded Successfully!";
                        //$this->response->setHeader('Content-Type', get_mime_by_extension($name));
                        //$dataArr['showfile'] = $this->response->download($filepath, $name);
                        $dataArr['file'] = $name;
                    } else {

                        $dataArr['errorMsg'] = "File not uploaded.";
                    }
                }
            }
        }

        echo json_encode($dataArr);
    }




    /* 
    Function to Display Unit End Assessment File
    Abhishek G
    */
    public function showUEAFile()
    {
        helper("filesystem");
        $programme_course_unit_id = $this->request->getGet('programme_course_unit_id');
        $filename = $this->request->getGet('filename');

        $path = WRITEPATH . 'uploads/ueaData/';
        $fullpath = $path . $filename;
        $file = new \CodeIgniter\Files\File($fullpath, true);
        $binary = readfile($fullpath);
        return $this->response
            ->setHeader('Content-Type', $file->getMimeType())
            ->setHeader('Content-disposition', 'inline; filename="' . $file->getBasename() . '"')
            ->setStatusCode(200)
            ->setBody($binary);
    }



    /* 
    Function to Delete Unit End Assessment File
    Abhishek G
    */
    public function deleteUEA()
    {

        helper('filesystem');
        $dataArr = array();
        $ueaArr = array();
        $pcuArr = array();
        $programmecourseunitModel = new ProgrammeCourseUnitModel();
        $uealogModel = new UEALogModel();


        $programme_course_unit_id = $this->request->getPost('programme_course_unit_id');


        $ueaArr['programme_course_unit_id'] = $programme_course_unit_id;
        $ueaArr['action'] = 'Deleted';
        $ueaArr['user_id'] = 1;

        $pcuArr['uea'] = '';
        $pcuArr['uea_uploaded_by'] = 0;

        $deleteURL = config(App::class)->uploadueaDataPath;
        $file = $deleteURL . '/' . 'PCU_' . $programme_course_unit_id . '.pdf';


        $ueaLogUpdated =  $uealogModel->save($ueaArr);
        $ueaDeleted =  $programmecourseunitModel->update($programme_course_unit_id, $pcuArr);
        unlink($file);

        if ($ueaDeleted && $ueaLogUpdated) {
            $dataArr['successMsg'] = "UEA deleted Successfully!";
        } else {
            $dataArr['errorsMsg'] = "Cannot delete UEA!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }


    /* 
    Function to Fetch Vetter Data
    Abhishek G
    */
    public function fetchvetterData()
    {

        $dataArr = array();
        $dataArr['pageTitle'] = "Vetter Remarks";
        $dataArr['menu'] = "Vetter";
        $dataArr['subMenu'] = "List";
        $dataArr['viewPage'] = 'admin/Programmecourse/vetter';

        $sessionData = session()->get('user');


        $programmeCourseModel = new ProgrammeCourseModel();
        $facultyModel = new FacultyModel();
        $programmecourse_id = $this->request->getGet('programmecourse_id');

        $dataArr['courseDetails'] = $programmeCourseModel->getProgramCourseDetails($programmecourse_id);
        $dataArr['quadData'] = $programmeCourseModel->getProgramCourseQuaddata($programmecourse_id);

        return view('admin/layout', $dataArr);
    }
}
