<?php
// app/Models/UserModel.php

namespace App\Models;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table = 'dsh2_user_role';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','role_id','created_at'];

    // Add any additional methods or validation rules if needed
}
