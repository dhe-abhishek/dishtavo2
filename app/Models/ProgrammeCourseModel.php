<?php
// app/Models/ProgrammeCourseModel.php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ProgrammeCourseUnitModuleModel;
use App\Models\ModuleDocLogModel;

class ProgrammeCourseModel extends Model
{
    protected $table = 'dsh2_programme_course';
    protected $primaryKey = 'id';
    protected $allowedFields = ['subject_id', 'course_id', 'program_id', 'objectives', 'course_prerequisite', 'semester', 'effective_from_year', 'code', 'created_by'];

    /*
     * Function to get program course details
     * Author: Paresh A.
     */
    public function getProgramCourseDetails($programCourseId)
    {
        $query = $this->db->table('dsh2_programme_course AS pc')
            ->select('pc.id, pc.code, pc.semester, c.name, s.name as subject_name') // Select the columns you need from each table with custom aliases
            ->join('dsh2_course AS c', 'c.id = pc.course_id', 'inner')
            ->join('dsh2_subject AS s', 's.id = pc.subject_id', 'inner')
            ->where('pc.id', $programCourseId)
            ->limit(1)
            ->get();

        $result = $query->getResultArray(); // Adjust based on your needs

        return $result[0];
    }

    /*
     *Function to get template of course program
     * Author: Paresh A.
     */

    public function getProgramCourseTemplate($programCourseId)
    {
        //  ->select('pc.id, pc.code, pc.semester, c.name, s.name as subject_name')
        $query = $this->db->table('dsh2_programme_course AS pc')
            ->select('u.*,cu.id as prog_course_unit_id, cu.position, cu.id')
            ->join('dsh2_course AS c', 'c.id = pc.course_id', 'inner')
            ->join('dsh2_subject AS s', 's.id = pc.subject_id', 'inner')
            ->join('dsh2_programme_course_unit AS cu', 'cu.programme_course_id = pc.id', 'inner')
            ->join('dsh2_unit AS u', 'u.id = cu.unit_id', 'inner')
            ->where('pc.id', $programCourseId)
            ->orderby('cu.position', 'ASC')
            ->get();

        //print $this->db->getLastQuery();

        $allUnits = $query->getResultArray();

        // print "<pre>";

        $outArr = array();

        foreach ($allUnits as $eachUnit) {
            //print_r($eachUnit);
            //get unit modules
            $modulesquery = $this->db->table('dsh2_programme_course_unit_module AS um')
                ->select('m.*, um.position, um.id')
                ->join('dsh2_module AS m', 'm.id = um.module_id', 'inner')
                ->where('um.programme_course_unit_id', $eachUnit['prog_course_unit_id'])
                ->orderby('um.position', 'ASC')
                ->get();
            $modules = $modulesquery->getResultArray();

            $tempModules = array();
            // $tempArr = array();

            foreach ($modules as $eachModule) {
                $videoquery = $this->db->table('dsh2_module_video AS mv')
                    ->select('v.*,l.name as language, l.code as language_code, f.firstname, f.lastname, f.email, f.email')
                    ->select('s.studio_name, r.recording_date, r.recording_status')
                    ->select('d.firstname as editor_fname,d.lastname as editor_lname, e.remarks as editor_remark, e.status as editor_status')
                    ->select('m.firstname as vetter_fname,m.lastname as vetter_lname, t.vet_remarks, t.vet_action, t.status as vetting_status')
                    ->select('mv.id')
                    ->join('dsh2_video AS v', 'v.id = mv.video_id', 'inner')
                    ->join('dsh2_language AS l', 'l.id = v.language_id', 'inner')
                    ->join('dsh2_user AS f', 'f.id = v.user_id', 'left')
                    ->join('dsh2_recording_schedule AS r', 'r.video_id = v.id', 'left')
                    ->join('dsh2_studio AS s', 's.id = r.studio_id', 'left')
                    ->join('dsh2_editing_schedule AS e', 'e.video_id = v.id', 'left')
                    ->join('dsh2_user as d', 'd.id = e.user_id', 'left')
                    ->join('dsh2_vetting_schedule as t', 't.video_id = v.id', 'left')
                    ->join('dsh2_user as m', 'm.id = t.user_id', 'left')
                    ->where('mv.unit_module_id', $eachModule['id'])
                    ->get();
                $videos = $videoquery->getResultArray();

                // print "<BR>".$this->db->getLastQuery();
                $eachModule['videos_count'] = count($videos);
                $eachModule['videos'] = $videos;
                $tempModules[] = $eachModule;
            }

            $eachUnit['modules_count'] = count($tempModules);
            $eachUnit['modules'] = $tempModules;

            $outArr[] = $eachUnit;
        }


        //print_r($outArr);

        return $outArr;
    } //END getProgramCourseTemplate


    public function getVideoSuggestions($search)
    {
        $query = $this->db->table('dsh2_video')
            ->select('*')
            ->like('name', $search)
            ->get();
        return $query->getResultArray();
    }

    public function getUnitSuggestions($search)
    {
        $query = $this->db->table('dsh2_unit')
            ->select('*')
            ->like('name', $search)
            ->where('is_active', '1')
            ->get();
        return $query->getResultArray();
    }

    public function deleteUnit($unitId)
    {
        $modulesquery = $this->db->table('dsh2_programme_course_unit_module AS um')
            ->select('um.id')
            ->where('um.programme_course_unit_id', $unitId)
            ->get();
        $modules = $modulesquery->getResultArray();

        foreach ($modules as $eachModule) {

            //delete all videos with this unit module ID
            $this->db->table('dsh2_module_video')->where('unit_module_id', $eachModule['id'])->delete();

            //now delete module relation
            $this->db->table('dsh2_programme_course_unit_module')->where('id', $eachModule['id'])->delete();
        }

        //now delete unit

        $this->db->table('dsh2_programme_course_unit')->where('id', $unitId)->delete();
    } //END deleteUnit

    public function deleteModule($moduleId)
    {
        //delete all videos with this unit module ID
        $this->db->table('dsh2_module_video')->where('unit_module_id', $moduleId)->delete();

        //now delete module relation
        $this->db->table('dsh2_programme_course_unit_module')->where('id', $moduleId)->delete();
    } //END deleteUnit

    public function getNonAddedLanguageVideos($progCourseUnitModuleId)
    {
        $videoquery = $this->db->table('dsh2_video as v')
            ->select('v.*, l.name as language')
            ->join('dsh2_language AS l', 'l.id = v.language_id', 'inner')
            ->where('v.language_id NOT IN( SELECT language_id FROM dsh2_video as d INNER JOIN dsh2_module_video as m ON m.video_id =d.id AND m.unit_module_id =' . $progCourseUnitModuleId . ')')
            ->get();
        return $videos = $videoquery->getResultArray();
        //  print_r($videos);
    }

    public function getNonAddedLanguages($progCourseUnitModuleId)
    {
        $videoquery = $this->db->table('dsh2_language as l')
            ->select('*')
            ->where('l.id NOT IN( SELECT language_id FROM dsh2_video as d INNER JOIN dsh2_module_video as m ON m.video_id =d.id AND m.unit_module_id =' . $progCourseUnitModuleId . ')')
            ->get();
        return $videos = $videoquery->getResultArray();
        //  print_r($videos);
    }

    public function getProgramCourses()
    {
        $query = $this->db->table('dsh2_programme_course AS pc')
            ->select('pc.id, pc.code, pc.semester, c.name, s.name as subject_name, pc.objectives') // Select the columns you need from each table with custom aliases
            ->join('dsh2_course AS c', 'c.id = pc.course_id', 'inner')
            ->join('dsh2_subject AS s', 's.id = pc.subject_id', 'inner')
            ->get();

        $result = $query->getResultArray(); // Adjust based on your needs
        //print_r($result);

        return $result;
    }

    //Function to retrieve 
    public function getProgramCourseQuaddata($programCourseId)
    {
        //  ->select('pc.id, pc.code, pc.semester, c.name, s.name as subject_name')

        $query = $this->db->table('dsh2_programme_course AS pc')
            ->select('u.*,cu.id as prog_course_unit_id, cu.position, cu.id')
            ->join('dsh2_course AS c', 'c.id = pc.course_id', 'inner')
            ->join('dsh2_subject AS s', 's.id = pc.subject_id', 'inner')
            ->join('dsh2_programme_course_unit AS cu', 'cu.programme_course_id = pc.id', 'inner')
            ->join('dsh2_unit AS u', 'u.id = cu.unit_id', 'inner')
            ->where('pc.id', $programCourseId)
            ->orderby('cu.position', 'ASC')
            ->get();

        //print $this->db->getLastQuery();

        $allUnits = $query->getResultArray();
        //print $this->db->getLastQuery();
        //die;
        //print "<pre>";
        //print_r($allUnits);
        //die;
        $outArr = array();

        foreach ($allUnits as $eachUnit) {
            //print_r($eachUnit);
            //get unit modules
            $modulesquery = $this->db->table('dsh2_programme_course_unit_module AS um')
                ->select('m.*, um.position, um.id as umid,um.user_id,u.salutation,u.firstname,u.lastname, m.generated_transcript, m.id as id')
                ->join('dsh2_module AS m', 'm.id = um.module_id', 'inner')
                ->join('dsh2_user AS u', 'u.id = um.user_id', 'left')
                ->where('um.programme_course_unit_id', $eachUnit['prog_course_unit_id'])
                ->orderby('um.position', 'ASC')
                ->get();
            $eachUnit["modules"] = $modulesquery->getResultArray();

            $outArr[] = $eachUnit;
        }

        //print "<pre>";
        //print_r($outArr);
        //die;
        return $outArr;
    }


    public function fetchProgrammeCourseUnits($programCourseId)
    {
        $query = $this->db->table('dsh2_programme_course_unit AS pcu')
            ->select('u.id, pcu.position,u.name,pcu.id as programme_course_unit_id,pcu.uea_uploaded_by,pcu.uea,pcu.programme_course_id,pcu.unit_id')
            ->join('dsh2_unit AS u', 'u.id = pcu.unit_id', 'inner')
            ->where('pcu.programme_course_id', $programCourseId)
            ->orderby('pcu.position', 'ASC')
            ->get();

        $allUnits = $query->getResultArray();
        //print "<pre>";
        //print_r($allUnits);
        //die;
        return $allUnits;
    }
}
