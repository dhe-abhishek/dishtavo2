<?php
// app/Models/CollegeModel.php
/* Abhishek G 03/01/2024 */

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table = 'dsh2_video';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name', 'video_url', 'language_id', 'is_active', 'is_archive', 'created_by', 'updated_by', 'deleted_by', 'created_at', 'updated_at', 'deleted_at'];

    // Add any additional methods or validation rules if needed
    public function getAllVideoDetails(){

        $videoDetails=array();
        $query = $this->db->table('dsh2_video AS v')
            ->select('v.id, v.name as title, v.video_url,v.created_at') // Select the columns you need from each table with custom aliases
            ->select('u.firstname,u.lastname,u.salutation ') // Select the columns you need from each table with custom aliases
            ->select('l.name as language ,l.id as language_id' ) // Select the columns you need from each table with custom aliases
            ->join('dsh2_language l', 'l.id = v.language_id', 'inner')
            ->join('dsh2_user u', 'u.id = v.user_id', 'inner')
            ->where('v.deleted_at', NULL)
            ->get();

        $videoDetails = $query->getResultArray(); // Adjust based on your needs
        return $videoDetails;
    }
}
