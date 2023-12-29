<?php

namespace App\Controllers\admin;

use App\Models\ProgrammeCourseModel;
use App\Models\UnitModel;
use App\Models\ProgrammeCourseUnitModel;
use App\Controllers\BaseController;

class Template extends BaseController
{
    public function index()
    {
        $dataArr = array();
        $dataArr['pageTitle'] = "Course Template";
        $dataArr['menu'] = "Template";
        $dataArr['subMenu'] = "List";
        $dataArr['viewPage'] = 'admin/template/list';

        $sessionData = session()->get('user');

        $ProgrammeCourseModel = new ProgrammeCourseModel();

        //$templates = $templateModel->where('location', $location)->findAll();
        $dataArr['courseDetails'] = $ProgrammeCourseModel->getProgramCourseDetails(1);
        $dataArr['template'] = $ProgrammeCourseModel->getProgramCourseTemplate(1);

        //get all units
        $unitModel = new UnitModel();
        $dataArr['units'] = $unitModel->where('is_active',1)->orderBy('id', 'asc')->findAll();
        //print "<pre>";
        //print_r($dataArr['units']);

        //get all modules

        //get all videos

       // print "<pre>";
        //print_r($dataArr['template']);
       //die;


        //print_r($sessionData);
        return view('admin/layout', $dataArr);
        //return view('welcome_message');
    }

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
        $userData['position'] = $this->request->getPost('position');
        $userData['unit_id'] = $this->request->getPost('unit_id');
       
        $unitId = $this->request->getPost('unit_id');

       // print_r($userData);

        if(!$unitId){
            //Create new unit
            $userData['created_by'] = 1;//add session user id
            $userData['name'] = $this->request->getPost('unitname');
            $userData['learning_objectives'] = $this->request->getPost('learning_objective');

            $unitAdded = $unitModel->save($userData);
            $unitId = $unitModel->getInsertID();

        }
       
        //now map this unit to course program
        $programmeCourseUnitData = array();
        $programmeCourseUnitData['created_by'] = 1;//add session user id
        $programmeCourseUnitData['programme_course_id'] = $this->request->getPost('course_id');
        $programmeCourseUnitData['position'] = $this->request->getPost('position');
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

    public function deleteUnit($unitId)
    {
        $unitModel = new UnitModel();
        $programmeCourseUnitDeleted = $unitModel->delete($unitId);
        
        if ($programmeCourseUnitDeleted) {
            $dataArr['successMsg'] = "New Unit deleted successfully.";
            
        } else {
            $dataArr['errorsMsg'] = "Cannot delete Unit!";
           
        }

        echo json_encode($dataArr); // Return a JSON response
    }

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
    }
}
