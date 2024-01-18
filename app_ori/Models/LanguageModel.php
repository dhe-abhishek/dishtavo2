<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class LanguageModel extends Model
{
    protected $table = 'dsh2_language';
    protected $primaryKey = 'id';
    protected $allowedFields = ['code', 'name'];

    // Add any additional methods or validation rules if needed
   

}
