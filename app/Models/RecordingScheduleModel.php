<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class RecordingScheduleModel extends Model
{
    protected $table = 'dsh2_recording_schedule';
    protected $primaryKey = 'id';
    protected $allowedFields = ['studio_name','details','video_id','studio_id','recording_date','recording_status','remarks','created_at','updated_at','deleted_at','created_by','updated_b','deleted_by'];

    // Add any additional methods or validation rules if needed
}
