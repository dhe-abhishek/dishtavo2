<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'dsh2_course';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'is_active', 'created_by'];

    // Add any additional methods or validation rules if needed

    public function getAllCourseCount(){
        $courseCount=array();
        $query = $this->db->table('dsh2_course AS c')
            ->select('count(c.id) as course_count') // Select the columns you need from each table with custom aliases
            ->get(1);

        $courseCount = $query->getResultArray(); // Adjust based on your needs
        return $courseCount[0];
    }
}
