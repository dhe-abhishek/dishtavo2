<?php

namespace App\Controllers\admin;

use App\Models\ProgrammeCourseModel;
use App\Models\UnitModel;
use App\Models\ModuleModel;
use App\Models\VideoModel;
use App\Models\ProgrammeCourseUnitModel;
use App\Models\ProgrammeCourseUnitModuleModel;
use App\Models\ModuleVideoModel;
use App\Models\LanguageModel;
use App\Controllers\BaseController;

class Template extends BaseController
{
    var $sessionUser = array();
    var $roleMenu = array();
    var $session = array();
    var $programmeCourseId = 0;

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

        //$menu = new MenuModel();
       // $roleId =1;//user logged in users role ID
       // $this->roleMenu = $menu->getMenuForRole($roleId);
    }

    public function index()
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Course Template";
        $dataArr['menu'] = "Template";
        $dataArr['subMenu'] = "List";
        $dataArr['viewPage'] = 'admin/template/list';
        $dataArr['sessionUser'] =  $this->sessionUser;
        
        $sessionData = session()->get('user');

        $ProgrammeCourseModel = new ProgrammeCourseModel();

        //$templates = $templateModel->where('location', $location)->findAll();
        $this->programmeCourseId=$this->request->getPost('programmecourse_id');
        $dataArr['courseDetails'] = $ProgrammeCourseModel->getProgramCourseDetails($this->programmeCourseId);
        $dataArr['template'] = $ProgrammeCourseModel->getProgramCourseTemplate($this->programmeCourseId);

        //get all units
        $unitModel = new UnitModel();
        $dataArr['units'] = $unitModel->where('is_active', 1)->orderBy('id', 'asc')->findAll();

        $unitList = array();
        foreach ($dataArr['units'] as $eachUnit) {
            $temp = array();
            $eachUnit['data'] = $eachUnit;
            $eachUnit['value'] = $eachUnit['name'];

            $unitList[] = $eachUnit;
        }
        $dataArr['unitList'] =  $unitList;

        //print "<pre>";
        //print_r($dataArr['units']);

        //get all modules
        $moduleModel = new ModuleModel();
        $dataArr['modules'] = $moduleModel->where('is_active', 1)->orderBy('id', 'asc')->findAll();

        //get all videos
        $videoModel = new VideoModel();
        $dataArr['videos'] = $videoModel->where('is_active', 1)->orderBy('id', 'asc')->findAll();

        //get all videos
        $languageModel = new LanguageModel();
        $dataArr['languages'] = $languageModel->orderBy('id', 'asc')->findAll();

        // print "<pre>";
        //print_r($dataArr['template']);
        //die;


        //print_r($sessionData);
        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    //START Manage Units -----------------------------------------------------------------------
    /*
     *
     * 
     */

    public function saveUnit()
    {
        $unitModel = new UnitModel();

        //validate logged in session user-----------------------------------------------

        //

        $userData = array();

        $userData['programme_course_id'] = $this->request->getPost('course_id');
        $userData['position'] = $this->request->getPost('unit_position');
        $userData['unit_id'] = $this->request->getPost('unit_id');

        $unitId = $this->request->getPost('unit_id');

        // print_r($userData);

        if (!$unitId) {
            //Create new unit
            $userData['created_by'] = 1; //add session user id
            $userData['name'] = $this->request->getPost('unitname');
            $userData['learning_objectives'] = $this->request->getPost('learning_objective');

            $unitAdded = $unitModel->save($userData);
            $unitId = $unitModel->getInsertID();
        }

        //now map this unit to course program
        $programmeCourseUnitData = array();
        $programmeCourseUnitData['created_by'] = 1; //add session user id
        $programmeCourseUnitData['programme_course_id'] = $this->request->getPost('course_id');
        $programmeCourseUnitData['position'] = $this->request->getPost('unit_position');
        $programmeCourseUnitData['unit_id'] = $unitId;

        $programmeCourseUnitModel = new ProgrammeCourseUnitModel();
        $programmeCourseUnitAdded = $programmeCourseUnitModel->save($programmeCourseUnitData);
        //print_r($programmeCourseUnitAdded);
        // print $programmeCourseUnitModel->getLastQuery();


        if ($programmeCourseUnitAdded) {
            $dataArr['successMsg'] = "New Unit added successfully.";
        } else {
            $dataArr['errorsMsg'] = "Cannot add Unit!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }

    public function deleteUnit()
    {
        $programCourseModel = new ProgrammeCourseModel();

        $unitId =  $this->request->getPost('unit_id');
        // $programmeCourseUnitDeleted = $programCourseUnitModel->delete($unitId);

        //Delete related unit_modules
        //$moduleModel = new ProgrammeCourseUnitModuleModel();
        //$programCourseUnitModel->where('programme_course_unit_id', $unitId)->delete();

        //delete module videos
        $programmeCourseUnitDeleted = $programCourseModel->deleteUnit($unitId);


        if ($programmeCourseUnitDeleted) {
            $dataArr['successMsg'] = "New Unit deleted successfully.";
        } else {
            $dataArr['errorsMsg'] = "Cannot delete Unit!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }


    public function updateUnitPosition()
    {
        $programCourseUnitModel = new ProgrammeCourseUnitModel();

        $unitId =  $this->request->getPost('unit_id');
        $userData = array();
        $userData['position'] = $this->request->getPost('position');

        $programCourseUnitUpdated = $programCourseUnitModel->update($unitId, $userData);


        if ($programCourseUnitUpdated) {
            $dataArr['successMsg'] = "Unit Position updated successfully.";
        } else {
            $dataArr['errorsMsg'] = "Cannot update unit position!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }
    //END Manage Units -----------------------------------------------------------------------
    //START Manage Modules---------------------------------------------------------------------
    /*
     *
     * 
     */

    public function saveModule()
    {
        $moduleModel = new ModuleModel();

        //validate logged in session user-----------------------------------------------

        //

        $userData = array();

        $userData['programme_course_unit_id'] = $this->request->getPost('selected_unit_id');
        $userData['position'] = $this->request->getPost('position');
        $userData['module_id'] = $this->request->getPost('module_id');

        $moduleId = $this->request->getPost('module_id');

        // print_r($userData);

        if (!$moduleId) {
            //Create new module
            $userData['created_by'] = 1; //add session user id
            $userData['name'] = $this->request->getPost('modulename');
            $userData['learning_outcomes'] = $this->request->getPost('learning_outcomes');

            $moduleAdded = $moduleModel->save($userData);
            $moduleId = $moduleModel->getInsertID();
        }

        //now map this module to course program unit
        $programmeCourseUnitModuleData = array();
        $programmeCourseUnitModuleData['created_by'] = 1; //add session user id
        $programmeCourseUnitModuleData['programme_course_unit_id'] = $this->request->getPost('selected_unit_id');
        $programmeCourseUnitModuleData['position'] = $this->request->getPost('position');
        $programmeCourseUnitModuleData['module_id'] = $moduleId;

        $programmeCourseUnitModuleModel = new ProgrammeCourseUnitModuleModel();
        $programmeCourseUnitModuleAdded = $programmeCourseUnitModuleModel->save($programmeCourseUnitModuleData);
        //print_r($programmeCourseModuleAdded);
        // print $programmeCourseModuleModel->getLastQuery();


        if ($programmeCourseUnitModuleAdded) {
            $dataArr['successMsg'] = "New Module added successfully.";
        } else {
            $dataArr['errorsMsg'] = "Cannot add Module!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }

    public function deleteModule()
    {
        $moduleId =  $this->request->getPost('module_id');
        /*$programCourseModuleModel = new ProgrammeCourseUnitModuleModel();
 
         
         $programmeCourseModuleDeleted = $programCourseModuleModel->delete($moduleId);
         */

        $programCourseModel = new ProgrammeCourseModel();
        $programmeCourseModuleDeleted = $programCourseModel->deleteModule($moduleId);

        if ($programmeCourseModuleDeleted) {
            $dataArr['successMsg'] = "New Module deleted successfully.";
        } else {
            $dataArr['errorsMsg'] = "Cannot delete Module!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }


    public function updateModulePosition()
    {
        $programCourseModuleModel = new ProgrammeCourseUnitModuleModel();

        $moduleId =  $this->request->getPost('module_id');
        $userData = array();
        $userData['position'] = $this->request->getPost('position');

        $programCourseModuleUpdated = $programCourseModuleModel->update($moduleId, $userData);


        if ($programCourseModuleUpdated) {
            $dataArr['successMsg'] = "Module Position updated successfully.";
        } else {
            $dataArr['errorsMsg'] = "Cannot update module position!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }
    //END Manage Modules-----------------------------------------------------------------------

    //START Manage Videos---------------------------------------------------------------------
    /*
     *
     * 
     */

    public function saveVideo()
    {
        $videoModel = new VideoModel();

        //validate logged in session user-----------------------------------------------

        //

        $userData = array();

        $userData['programme_course_unit_module_id'] = $this->request->getPost('selected_programme_course_unit_module_id');
        $userData['video_id'] = $this->request->getPost('video_id');

        $videoId = $this->request->getPost('video_id');

        // print_r($userData);

        if (!$videoId) {
            //Create new video
            $userData['created_by'] = 1; //add session user id
            $userData['name'] = $this->request->getPost('videoname');
            $userData['video_url'] = $this->request->getPost('video_url');

            $videoAdded = $videoModel->save($userData);
            $videoId = $videoModel->getInsertID();
        }

        //now map this video to course program unit
        $moduleVideoData = array();
        $moduleVideoData['created_by'] = 1; //add session user id
        $moduleVideoData['unit_module_id'] = $this->request->getPost('selected_programme_course_unit_module_id');
        $moduleVideoData['video_id'] = $videoId;

        $moduleVideoModel = new ModuleVideoModel();
        $moduleVideoAdded = $moduleVideoModel->save($moduleVideoData);
        //print_r($programmeCourseVideoAdded);
        // print $programmeCourseVideoModel->getLastQuery();


        if ($moduleVideoAdded) {
            $dataArr['successMsg'] = "New Video added successfully.";
        } else {
            $dataArr['errorsMsg'] = "Cannot add Video!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }

    public function deleteVideo()
    {
        $programCourseVideoModel = new ModuleVideoModel();

        $videoId =  $this->request->getPost('video_id');
        $programmeCourseVideoDeleted = $programCourseVideoModel->delete($videoId);

        if ($programmeCourseVideoDeleted) {
            $dataArr['successMsg'] = "New Video deleted successfully.";
        } else {
            $dataArr['errorsMsg'] = "Cannot delete Video!";
        }

        echo json_encode($dataArr); // Return a JSON response
    }


    /*
     there is no video positioning  feature
     public function updateVideoPosition()
     {
         $programCourseVideoModel = new ModuleVideoModel();
 
         $videoId =  $this->request->getPost('video_id');
         $userData = array();
         $userData['position'] = $this->request->getPost('position');
         
         $programCourseVideoUpdated = $programCourseVideoModel->update($videoId, $userData);
 
         
         if ($programCourseVideoUpdated) {
             $dataArr['successMsg'] = "Video Position updated successfully.";
             
         } else {
             $dataArr['errorsMsg'] = "Cannot update video position!";
            
         }
 
         echo json_encode($dataArr); // Return a JSON response
     }*/

    public function getUnitSuggestion()
    {
        $search = $this->request->getPost('search');
        //$suggestions = $this->searchModel->getSuggestions($search);

        $programmeCourseModel = new ProgrammeCourseModel();
        $suggestions = $programmeCourseModel->getUnitSuggestions($search);

        //print  $programmeCourseModel->getLastQuery();

        $data = [];
        foreach ($suggestions as $suggestion) {
            $data[] = [
                'value' => $suggestion['name'],
                'label' => $suggestion['name'],
                'id' => $suggestion['id']
            ];
        }

        echo json_encode($data);
    }
    public function getVideoSuggestion()
    {
        $search = $this->request->getPost('search');
        //$suggestions = $this->searchModel->getSuggestions($search);

        $programmeCourseModel = new ProgrammeCourseModel();
        $suggestions = $programmeCourseModel->getVideoSuggestions($search);

        //print  $programmeCourseModel->getLastQuery();

        $data = [];
        foreach ($suggestions as $suggestion) {
            $data[] = [
                'value' => $suggestion['video_url'],
                'label' => $suggestion['name']
            ];
        }

        echo json_encode($data);
    }


    public function getNonAddedLanguageVideos()
    {
        $programmeCourseModel = new ProgrammeCourseModel();

        $progCourseUnitModuleId =  $this->request->getPost('programme_course_unit_module_id');
        $nonAddedLanguageVideos = $programmeCourseModel->getNonAddedLanguageVideos($progCourseUnitModuleId);

       // echo json_encode($nonAddedLanguageVideos); // Return a JSON response
        $outStr = '';
        $outStr.= '<option value="">Select Video</option>';

        foreach($nonAddedLanguageVideos as $eachVideo){
            $outStr.= '<option value='.$eachVideo['id'].'>'.$eachVideo['name'].' | '.$eachVideo['language'].' | ('.$eachVideo['video_url'].')</option>';
        }

        print $outStr;
    }

    public function getNonAddedLanguages()
    {
        $programmeCourseModel = new ProgrammeCourseModel();

        $progCourseUnitModuleId =  $this->request->getPost('programme_course_unit_module_id');
        $nonAddedLanguages = $programmeCourseModel->getNonAddedLanguages($progCourseUnitModuleId);
        //  print  $programmeCourseModel->getLastQuery();

       // echo json_encode($nonAddedLanguages); // Return a JSON response

       $outStr = '';
       $outStr.= '<option value="">Select Language</option>';
       foreach($nonAddedLanguages as $eachLang){
           $outStr.= '<option value='.$eachLang['id'].'>'.$eachLang['name'].'</option>';
       }

       print $outStr;
    }
    //END Manage Videos-----------------------------------------------------------------------
    /*
    public function edit(): string
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Templates";
        $dataArr['menu'] = "Template";
        $dataArr['subMenu'] = "edit";
        $dataArr['viewPage'] = 'admin/template/edit';

        $sessionData = session()->get('user');
        $templateId = $this->request->getPost('template_id');

        $templateModel = new ProgrammeCourseModel();
        $dataArr['templateDetails'] = $templateModel->where('id', $templateId)->findAll()[0];

        //print_r($dataArr['templateDetails']);

        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

    public function update()
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Manage Templates";
        $dataArr['menu'] = "Template";
        $dataArr['subMenu'] = "";
        $dataArr['successMsg'] = "";

        $templateModel = new ProgrammeCourseModel();

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
                $templateId = $this->request->getPost('template_id');

                $userData['name'] = $this->request->getPost('name');
                $userData['address'] = $this->request->getPost('address');
                $userData['email'] = $this->request->getPost('email');
                $userData['mobile'] = $this->request->getPost('mobile');
                $userData['is_active'] = 1;

                $templateAdded = $templateModel->update($templateId, $userData);

                if ($templateAdded) {
                    $dataArr['successMsg'] = "Template updated successfully.";
                    $dataArr['viewPage'] = 'admin/template/list';
                    // Set a temporary session message
                    $session = session();
                    $session->setFlashdata('success', 'Template updated successfully');

                    return redirect()->to('dish2o_admin/templates'); // Redirect to a dashboard pa
                    exit;
                } else {
                    $dataArr['viewPage'] = 'admin/template/edit';
                    //return redirect()->to('dish2o_admin/template/add')->with('error', 'Invalid username or password');
                }
            } else {
                $errors = $validation->getErrors();
                $dataArr['errors'] = $errors;

                //print_r( $errors);
                $dataArr['viewPage'] = 'admin/template/edit';
            }
        }

        return view('admin/layout', $dataArr);
    } */
}
