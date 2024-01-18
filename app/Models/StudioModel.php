<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class StudioModel extends Model
{
    protected $table = 'dsh2_studio';
    protected $primaryKey = 'id';
    protected $allowedFields = ['studio_name','details'];

    // Add any additional methods or validation rules if needed
}
