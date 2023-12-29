<?php
// app/Models/UserModel.php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'dsh2_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email', 'mobile'];

    // Add any additional methods or validation rules if needed
}
