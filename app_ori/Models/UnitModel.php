<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table = 'dsh2_unit';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','learning_objectives','is_active','is_archive','created_by','updated_by','deleted_by','created_at','updated_at','deleted_at'];

    // Add any additional methods or validation rules if needed
}
