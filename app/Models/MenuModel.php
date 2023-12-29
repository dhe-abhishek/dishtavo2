<?php
// app/Models/MenuModel.php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'dsh2_menu';
    protected $primaryKey = 'id';
    protected $allowedFields = ['parent_id', 'name'];

    // Add any additional methods or validation rules if needed

    public function getMenuForRole($roleId)
    {
        return $this->select('dsh2_menu.*')
                    ->join('dsh2_role_menu as rm', 'rm.menu_id = dsh2_menu.id', 'left')
                    ->where('rm.role_id', $roleId)
                    ->orWhere('dsh2_menu.parent_id', 0) // Assuming top-level menus have parent_id = 0
                    ->groupBy('dsh2_menu.id')
                    ->orderBy('dsh2_menu.parent_id, dsh2_menu.id', 'asc')
                    ->findAll();
    }
}
