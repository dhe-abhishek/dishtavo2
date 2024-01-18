<?php
// app/Models/UserModel.php

namespace App\Models;

use CodeIgniter\Model;

class VetterRemarkModel extends Model
{
    protected $table = 'dsh2_vetter_remark';
    protected $primaryKey = 'id';
    protected $allowedFields = ['vetting_schedule_id', 'content_changes', 'rec_remarks', 'other_rec_reson', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    // Add any additional methods or validation rules if needed
}
