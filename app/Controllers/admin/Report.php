<?php

namespace App\Controllers\admin;

use App\Models\CollegeModel;
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

class Report extends BaseController
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
    }

    public function index()
    {
        $dataArr = array();
        $dataArr['menu'] = "Home";
        $dataArr['pageTitle'] = "Reports";
        $dataArr['subMenu'] = "";
        $dataArr['viewPage'] = 'admin/report/list';
        $dataArr['sessionUser'] =  $this->sessionUser;

        $programmeModel = new ProgrammeModel();
        $dataArr['programmes'] = $programmeModel->orderBy('id', 'asc')->findAll();


        return view('admin/layout', $dataArr);
    }

    public function getSubjectsByProgrammeId()
    {
        $programmecourseModel = new ProgrammeCourseModel();
        $programmeId = $this->request->getPost('program_id');
        $subjects = $programmecourseModel->getSubjectsByProgrammeId($programmeId);
        echo json_encode($subjects);
    }

    public function getCourseBySubjectId()
    {
        $programmecourseModel = new ProgrammeCourseModel();
        $subjectId = $this->request->getPost('subject_id');
        $programId = $this->request->getPost('program_id');
        $courses = $programmecourseModel->getCourseBySubjectId($subjectId, $programId);
        $lastQuery = $programmecourseModel->getLastQuery();
        //print "<pre>";
        //print_r($courses);
        //print($lastQuery);
        //die;
        echo json_encode($courses);
    }

    public function getIncompleteModules()
    {

        $dataArr = array();
        $dataArr['menu'] = "Home";
        $dataArr['pageTitle'] = "Reports";
        $dataArr['subMenu'] = "";
        $dataArr['viewPage'] = 'admin/report/list';
        $dataArr['sessionUser'] =  $this->sessionUser;

        helper(['form']);
        helper('url');
        $programmecourseModel = new ProgrammeCourseModel();
        if ($this->request->getMethod(true) === 'POST') {
            $courseId = $this->request->getPost('course');
            $programId = $this->request->getPost('programme');
         
            $dataArr['incompletemodules'] = $programmecourseModel->getIncompleteModules($programId, $courseId);
            $programmeModel = new ProgrammeModel();
            $dataArr['programmes'] = $programmeModel->orderBy('id', 'asc')->findAll();
            //print "<pre>";
            //print_r( $dataArr['incompletemodules']);
            //die;
        }
        
         return view('admin/layout', $dataArr);
        //echo json_encode($incompletemodules);
    }
}
