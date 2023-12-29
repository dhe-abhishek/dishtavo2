<?php
// app/Models/ProgrammeCourseModel.php

namespace App\Models;

use CodeIgniter\Model;

class ProgrammeCourseModel extends Model
{
    protected $table = 'dsh2_programme_course';
    protected $primaryKey = 'id';
    protected $allowedFields = [];

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
        ->select('u.*,cu.id as prog_course_unit_id, cu.position')
        ->join('dsh2_course AS c', 'c.id = pc.course_id', 'inner')
        ->join('dsh2_subject AS s', 's.id = pc.subject_id', 'inner')
        ->join('dsh2_programme_course_unit AS cu', 'cu.programme_course_id = pc.id', 'inner')
        ->join('dsh2_unit AS u', 'u.id = cu.unit_id', 'inner')
        ->where('pc.id', $programCourseId)
        ->get();

        //print $this->db->getLastQuery();

        $allUnits = $query->getResultArray();
        
       // print "<pre>";
        
        $outArr = array();

        foreach($allUnits as $eachUnit){
            //print_r($eachUnit);
            //get unit modules
            $modulesquery = $this->db->table('dsh2_programme_course_unit_module AS um')
            ->select('m.*, um.position')
            ->join('dsh2_module AS m', 'm.id = um.module_id', 'inner')
            ->where('um.program_course_unit_id', $eachUnit['prog_course_unit_id'])
            ->get();
            $modules = $modulesquery->getResultArray();

            $tempModules = array();
           // $tempArr = array();

            foreach($modules as $eachModule){
                $videoquery = $this->db->table('dsh2_module_video AS mv')
                ->select('v.*,l.name as language, l.code as language_code, f.firstname, f.lastname, f.email, f.email')
                ->select('s.studio_name, r.recording_date, r.recording_status')
                ->select('d.firstname as editor_fname,d.lastname as editor_lname, e.remarks as editor_remark, e.status as editor_status')
                ->select('m.firstname as vetter_fname,m.lastname as vetter_lname, t.vet_remarks, t.vet_action, t.status as vetting_status')
                ->join('dsh2_video AS v', 'v.id = mv.video_id', 'inner')
                ->join('dsh2_language AS l', 'l.id = v.language_id', 'inner')
                ->join('dsh2_user AS f', 'f.id = v.user_id', 'left')
                ->join('dsh2_recording_schedule AS r', 'r.video_id = v.id', 'left')
                ->join('dsh2_studio AS s', 's.id = r.studio_id', 'left')
                ->join('dsh2_editing_schedule AS e', 'e.video_id = v.id', 'left')
                ->join('dsh2_user as d', 'd.id = e.user_id', 'left')
                ->join('dsh2_vetting_schedule as t', 't.video_id = v.id', 'left')
                ->join('dsh2_user as m', 'm.id = t.user_id', 'left')
                ->where('mv.module_id', $eachModule['id'])
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
    }//END getProgramCourseTemplate
}
