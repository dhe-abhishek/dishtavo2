<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class ModuleDocLogModel extends Model
{
    protected $table = 'dsh2_module_doc_log';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['user_id', 'doc_type', 'module_id', 'filename', 'from_date', 'created_at'];
}
