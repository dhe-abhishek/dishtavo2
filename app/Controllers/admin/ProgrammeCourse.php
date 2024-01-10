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
        //print_r($sessionData);
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

        $ProgrammeCourseUnitModuleModelModel = new ProgrammeCourseUnitModuleModel();
        $dataArr['user_id'] = $this->request->getPost('user_id');
        $module_id = $this->request->getPost('module_id');
        $assignFacultyToModule =  $ProgrammeCourseUnitModuleModelModel->update($module_id, $dataArr);
        if ($assignFacultyToModule) {
            $dataArr['successMsg'] = "Faculty assigned to Module successfully.";
        } else {
            $dataArr['errorMsg'] = "Cannot assign Faculty to Module.";
        }
        echo json_encode($dataArr);
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
        $datafile=$this->request->getPost('datafile');

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
                    $name =  $this->request->getPost('module_id') . "_" . "Q-II-".$datafile. "." . $file->getClientExtension();  //Give random name to file
                    $quadData['filename'] = $name;
                    //$ext = $file->getClientExtension();

                    // Fetch uploadURL from app.php file
                    $uploadURL = config(App::class)->uploadPath;
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
                        <a href='".base_url('dish2o_admin/Programmecourse/showquadfile')."?module_id=".$module_id."&filename=".$file->getName()."' target='_blank' >Transcript</a>
                    ";
                    } else {
                        
                        $dataArr['errorMsg'] = "File not uploaded.";
                    }
                }
            }
        }

        echo json_encode($dataArr);
    }


    //  <a href='".base_url('dish2o_admin/Programmecourse/showquadfile')."?module_id=".$module_id."&something=".."' target='_blank' >Transcript</a>
    public function showQuadFile()
    {
        helper("filesystem");
        $module_id = $this->request->getGet('module_id');
        $filename = $this->request->getGet('filename');
       
        $path = WRITEPATH . 'uploads/quadData/Mod_'.$module_id.'/';
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


   // <a href='" . $quadDataURL . "/Mod_" . $module_id . "/" . $file->getName() . "' target='_blank'>Transcript</a>
    /* public function edit(): string
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
    } */

    /*   public function update()
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
