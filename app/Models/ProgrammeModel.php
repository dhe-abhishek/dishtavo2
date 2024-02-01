<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class ProgrammeModel extends Model
{
    protected $table = 'dsh2_programme';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'name', 'position', 'icon', 'email', 'is_active', 'is_archive', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at'];

    // Add any additional methods or validation rules if needed
    public function getAllProgrammeCount(){
        $programmeCount=array();
        $query = $this->db->table('dsh2_programme AS p')
            ->select('count(p.id) as programme_count') // Select the columns you need from each table with custom aliases
            ->get(1);

        $programmeCount = $query->getResultArray(); // Adjust based on your needs
        return $programmeCount[0];
    }
}
