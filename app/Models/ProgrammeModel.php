<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class ProgrammeModel extends Model
{
    protected $table = 'dsh2_programme';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'name', 'position', 'icon', 'email', 'is_active', 'is_archive', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at'];

    // Add any additional methods or validation rules if needed
}
