<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class UEALogModel extends Model
{
    protected $table = 'dsh2_uea_log';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['programme_course_unit_id', 'action', 'user_id', 'created_at'];
}
