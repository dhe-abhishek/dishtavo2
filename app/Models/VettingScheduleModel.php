<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class VettingScheduleModel extends Model
{
    protected $table = 'dsh2_vetting_schedule';
    protected $primaryKey = 'id';
    protected $allowedFields = ['video_id','user_id','allocation_date','status','vet_url','vet_cmpl_date','vet_action','vet_remarks','created_at','updated_at','deleted_at','created_by','updated_b','deleted_by'];

    // Add any additional methods or validation rules if needed
}
