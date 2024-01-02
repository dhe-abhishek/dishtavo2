<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class DesignationModel extends Model
{
    protected $table = 'dsh2_designation';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];

    // Add any additional methods or validation rules if needed
}
