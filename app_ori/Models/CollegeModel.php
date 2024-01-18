<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class CollegeModel extends Model
{
    protected $table = 'dsh2_college';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'address', 'email', 'mobile','is_active', 'created_by'];

    // Add any additional methods or validation rules if needed
}
