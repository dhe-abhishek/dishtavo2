<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class EditingScheduleModel extends Model
{
    protected $table = 'dsh2_editing_schedule';
    protected $primaryKey = 'id';
    protected $allowedFields = ['video_id','user_id','allocation_date','status','completion_date','remarks','created_at','updated_at','deleted_at','created_by','updated_b','deleted_by'];

    // Add any additional methods or validation rules if needed
}
