<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class FacultyModel extends Model
{
    protected $table = 'dsh2_faculty';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['user_id', 'college_id',    'current_appointment_type',    'current_designation_id', 'from_date', 'to_date', 'created_at', 'updated_at', 'deleted_at'];

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
            ->where('u.deleted_at', NULL)
            ->get();

        $facultypersonalDetails = $query->getResultArray(); // Adjust based on your needs
        //print "<pre>";
        //print_r($facultypersonalDetails);
        //die();
        $outArr = array();

        foreach ($facultypersonalDetails as $faculty) {
            $collegequery = $this->db->table('dsh2_faculty AS f')
                ->select('f.current_appointment_type,f.from_date,f.to_date') // Select the columns you need from each table with custom aliases
                ->select('d.name as designation') // Select the columns you need from each table with custom aliases
                ->select('c.name as college_name') // Select the columns you need from each table with custom aliases
                ->join('dsh2_designation d', 'd.id = f.current_designation_id', 'inner')
                ->join('dsh2_college c', 'c.id = f.college_id', 'inner')
                ->where('f.user_id', $faculty['id'])
                ->get();
            $faculty["collegedetails"] = $collegequery->getResultArray();
            $outArr[] = $faculty;
        }

        //print $this->db->getLastQuery();
        //print "<pre>";
        //print_r($outArr);
        //die();
        return $outArr;
    }


    /*Function to retrieve Faculty Names, Salutation and Id 
    * Author: Abhishek G.
    */
    /*Function to retrieve Faculty Names, Salutation and Id 
    * Author: Abhishek G.
    */
    public function getAllFacultyNames($keyword = '')
    {
        try {
            $query = $this->db->table('dsh2_user AS u')
                ->select('u.id, u.firstname, u.lastname, u.salutation, u.email, u.mobile')
                ->join('dsh2_faculty f', 'f.user_id = u.id', 'left')
                ->join('dsh2_user_role r', 'r.user_id = u.id AND r.role_id =5', 'inner');

            if ($keyword != '') {
                $query->like('u.firstname', $keyword)
                    ->orLike('u.lastname', $keyword);
            }

            $facultyNames = $query->get();
            $facultyResult = $facultyNames->getResultArray();

            // print $this->db->getLastQuery();

            // die;

            return $facultyResult;
        } catch (\Exception $e) {
            print_r($e);
        }
    }


    /*Function to retrieve Faculty details
    * Author: Paresh A.
    */
    public function getFacultyDetails($ID)
    {
        try {
            $query = $this->db->table('dsh2_user AS u')
                ->select('u.id, u.firstname, u.lastname, u.salutation, u.email, u.mobile,u.photo')
                ->join('dsh2_faculty f', 'f.user_id = u.id', 'left')
                ->join('dsh2_user_role r', 'r.user_id = u.id AND r.role_id =5', 'inner');


            $query->where('u.id', $ID);


            $facultyNames = $query->get();
            $facultyResult = $facultyNames->getResultArray();

            return $facultyResult[0];
        } catch (\Exception $e) {
            print_r($e);
        }
    }



    /*Function to retrieve Faculty College details
    * Author: Abhishek G.
    */
    public function getFacultyCollegeDetails($ID)
    {
        try {
            $query = $this->db->table('dsh2_user AS u')
                ->select('u.id, u.firstname, u.lastname, u.salutation, u.email, u.mobile,c.name as college_name, c.address,f.current_appointment_type,d.name as designation,f.from_date,f.to_date,f.id as faculty_id')
                ->join('dsh2_faculty f', 'f.user_id = u.id', 'inner')
                //->join('dsh2_user_role r', 'r.user_id = u.id AND r.role_id =1', 'inner')
                ->join('dsh2_user_role r', 'r.user_id = u.id', 'inner')
                ->join('dsh2_college c', 'c.id = f.college_id', 'inner')
                ->join('dsh2_designation d', 'd.id = f.current_designation_id', 'inner');

            $query->where('u.id', $ID);
            $query->orderBy('f.from_date', 'desc');


            $facultyNames = $query->get();
            $facultyResult = $facultyNames->getResultArray();
            //print"<pre>";
            //print_r($facultyResult);
            //print $this->db->getLastQuery();
            //die;
            return $facultyResult;
        } catch (\Exception $e) {
            print_r($e);
        }
    }
}
