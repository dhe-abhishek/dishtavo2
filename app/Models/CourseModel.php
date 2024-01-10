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
}
