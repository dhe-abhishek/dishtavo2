<?php

namespace App\Controllers\admin;

use App\Models\MenuModel;
use App\Models\ProgrammeModel;
use App\Models\ProgrammeCourseModel;
use App\Models\CourseModel;
use App\Models\VideoModel;
use App\Models\FacultyModel;
use App\Models\StudioModel;
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

        if (!$this->session->has('user')) {
            $url = base_url('dish2o_admin/login');
            header("location:" . $url);
            exit;
        }


        $this->sessionUser = $this->session->get('user');

        $menu = new MenuModel();
        $roleId = 1; //user logged in users role ID
        $this->roleMenu = $menu->getMenuForRole($roleId);
    }

    public function index()
    {
        $dataArr = array();
        $programmeSubject = array();
        $subjectCount = array();
        $month = array();
        $vCount = array();

        $dataArr['menu'] = "Home";
        $dataArr['subMenu'] = "";
        $dataArr['viewPage'] = 'admin/home';
        $dataArr['sessionUser'] =  $this->sessionUser;


        $programmeCourseModel = new ProgrammeCourseModel();
        $videoModel = new VideoModel();
        $courseModel = new CourseModel();
        $programmeModel = new ProgrammeModel();
        $facultyModel = new FacultyModel();
        $studioModel = new StudioModel();

        $dataArr['studioCount'] = $studioModel->getAllStudioCount();
        $dataArr['facultyCount'] = $facultyModel->getAllFacultyCount();
        $dataArr['programmeCount'] = $programmeModel->getAllProgrammeCount();
        $dataArr['courseCount'] = $courseModel->getAllCourseCount();
        $dataArr['videoCount'] = $videoModel->getAllVideoCount();
        $dataArr['videoCountMonthWise'] = $videoModel->getVideoCountMonthWise();
        $dataArr['programmecourseCount'] = $programmeCourseModel->fetchProgrammeSubjectCount();


        //print "<pre>";
        //print_r($dataArr['videoCountMonthWise']);
        //die;
        foreach ($dataArr['programmecourseCount'] as $programmecourseCount) {
            $programmeSubject[] = $programmecourseCount['Programme_name'];
            $subjectCount[] = $programmecourseCount['Subject_Count'];
        }

        foreach ($dataArr['videoCountMonthWise'] as $videoCount) {
            $month[] = $videoCount['month'];
            $vCount[] = $videoCount['video_count'];
        }


        if ($dataArr['programmecourseCount']) {
            $dataArr['successMsg'] = "Programme wise Subject count fetched Successfully.";
        } else {
            $dataArr['errorMsg'] = "Cannot fetch Programme wise Subject count.";
        }

        $dataArr['programmeSubject'] = $programmeSubject;
        $dataArr['subjectCount'] =  $subjectCount;
        $dataArr['month'] = $month;
        $dataArr['vCount'] =  $vCount;
        //$data['chart_data'] = json_encode($dataArr);
        //print_r($sessionData);

        return view('admin/layout', $dataArr);
    }
}
