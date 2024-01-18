<?php
// app/Models/UserModel.php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'dsh2_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','password','email','mobile','salutation','firstname','lastname','is_approved','is_active','created_at','updated_at','deleted_at'];

    // Add any additional methods or validation rules if needed

   
}
