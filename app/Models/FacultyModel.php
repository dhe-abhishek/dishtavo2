<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class FacultyModel extends Model
{
    protected $table = 'dsh2_faculty';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['user_id','college_id',	'current_appointment_type',	'current_designation_id','from_date','to_date','created_at','updated_at','deleted_at'];

    // Add any additional methods or validation rules if needed

    /*
     * Function to retrieve Faculty Details
     * Author: Abhishek G.
     */
    public function getAllFacultyDetails()
    {
        $query = $this->db->table('dsh2_user AS u')
        ->select('u.id, u.firstname, u.lastname, u.salutation, u.email,u.mobile') // Select the columns you need from each table with custom aliases
        ->select('r.name as role') // Select the columns you need from each table with custom aliases
        ->join('dsh2_user_role ur', 'ur.user_id = u.id', 'inner')
        ->join('dsh2_role r', 'r.id = ur.role_id', 'inner')
        ->where('u.deleted_at',NULL)
        ->get();

        $facultypersonalDetails = $query->getResultArray(); // Adjust based on your needs
      
        $outArr = array();

        foreach($facultypersonalDetails as $faculty){
            $collegequery=$this->db->table('dsh2_faculty AS f')
            ->select('f.current_appointment_type,f.from_date,f.to_date') // Select the columns you need from each table with custom aliases
            ->select('d.name as designation') // Select the columns you need from each table with custom aliases
            ->select('c.name as college_name') // Select the columns you need from each table with custom aliases
            ->join('dsh2_designation d', 'd.id = f.current_designation_id', 'inner')
            ->join('dsh2_college c', 'c.id = f.college_id', 'inner')
            ->where('f.user_id', $faculty['id'])
            ->get();
            $faculty["collegedetails"]=$collegequery->getResultArray();
            $outArr[]=$faculty;
        }
        //print "<pre>";
        //print_r($outArr);
        return $outArr;
    }
}
