<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class ModuleVideoModel extends Model
{
    protected $table = 'dsh2_module_video';
    protected $primaryKey = 'id';
    protected $allowedFields = ['unit_module_id','video_id','created_by','updated_by','deleted_by','created_at','updated_at','deleted_at'];

    // Add any additional methods or validation rules if needed
}
