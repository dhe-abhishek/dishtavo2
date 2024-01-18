<?php
// app/Models/UserModel.php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'dsh2_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','password','email','mobile','salutation','firstname','lastname','photo','is_approved','is_active','created_at','updated_at','deleted_at'];

    // Add any additional methods or validation rules if needed

    public function checkAdminUser($username)
    {
        $sql = "SELECT u.*, ur.role_id
        FROM dsh2_user AS u
        INNER JOIN dsh2_user_role AS ur ON ur.user_id = u.id
        WHERE ur.role_id = ?
          AND u.is_approved = ?
          AND u.is_active = ?
          AND (u.username = ? || u.email = ?)";

        $query = $this->db->query($sql, [1, 1, 1, $username, $username]);

        $result = $query->getResultArray();
        
        if(!$result) return false; else return $result[0];

        //print $this->db->getLastQuery();
    }

    public function getUsers($role = '')
    {
        $sql = "SELECT u.*,CONCAT(u.firstname,' ',u.lastname) as name
        FROM dsh2_user AS u
        INNER JOIN dsh2_user_role AS ur ON ur.user_id = u.id
        WHERE ur.role_id = ?
          AND u.is_approved = ?
          AND u.is_active = ?";

        $query = $this->db->query($sql, [$role, 1, 1]);

        $result = $query->getResultArray();
        return $result;

        //print $this->db->getLastQuery();
    }

    public function checkUser($username)
    {
        $sql = "SELECT u.*, ur.role_id
        FROM dsh2_user AS u
        INNER JOIN dsh2_user_role AS ur ON ur.user_id = u.id
        WHERE ur.role_id != ?
          AND u.is_approved = ?
          AND u.is_active = ?
          AND (u.username = ? || u.email = ?)";

        $query = $this->db->query($sql, [1, 1, 1, $username, $username]);

        $result = $query->getResultArray();
        
        if(!$result) return false; else return $result[0];

        //print $this->db->getLastQuery();
    }
}
