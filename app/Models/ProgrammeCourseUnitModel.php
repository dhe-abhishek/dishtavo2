<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class ProgrammeCourseUnitModel extends Model
{
    protected $table = 'dsh2_programme_course_unit';
    protected $primaryKey = 'id';
    protected $allowedFields = ['position','programme_course_id','unit_id','created_by','updated_by','deleted_by','created_at','updated_at','deleted_at'];

    // Add any additional methods or validation rules if needed
}
