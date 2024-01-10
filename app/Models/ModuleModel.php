<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class ModuleModel extends Model
{
    protected $table = 'dsh2_module';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','name','learning_outcomes','notes','transcript','generated_transcript','glossary','self_learning','module_assessment','is_active','is_archive','created_by','updated_by','deleted_by','created_at'.'updated_at','deleted_at'];

    // Add any additional methods or validation rules if needed
}
