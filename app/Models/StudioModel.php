<?php
// app/Models/CollegeModel.php

namespace App\Models;

use CodeIgniter\Model;

class StudioModel extends Model
{
    protected $table = 'dsh2_studio';
    protected $primaryKey = 'id';
    protected $allowedFields = ['studio_name','details'];

    // Add any additional methods or validation rules if needed
    public function getAllStudioCount(){
        $studioCount=array();
        $query = $this->db->table('dsh2_studio AS s')
            ->select('count(s.id) as studio_count') // Select the columns you need from each table with custom aliases
            ->get(1);

        $studioCount = $query->getResultArray(); // Adjust based on your needs
        return $studioCount[0];
    }
}
