<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\ProjectImage as ProjectImageEnitiy;

class ProjectImageModel extends Model
{
    protected $table            = 'projects_image';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = ProjectImageEnitiy::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'project_id',
        'image_id', 
        'image_name',
        'sort_order',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getImagesByProjectId(int $projectId)
    {
        return $this->select('projects_image.*, projects_image.id as projects_image_id, uploaded_images.*, uploaded_images.id as uploaded_images_id')->where('projects_image.project_id', $projectId)
        ->join('uploaded_images', 'projects_image.image_id = uploaded_images.id')
        ->orderBy('sort_order', 'ASC')->findAll();
    }

    public function getImageById(int $projectId)
    {
        return $this->where('id', $projectId)->first();
    }

    public function getImages(){
        return $this->findAll();
    }

    /**
     * Replaces rows using a database transaction.
     *
     * @param int   $projectId
     * @param array $newRows
     * @return bool
     */
    public function updateProjectImages(int $projectId, array $newRows): bool
    {
        foreach ($newRows as $row) {
            $data[] = [
                'project_id' => $projectId,
                'image_id' => $row['image_id'],
                'image_name' => $row['image_name'],
                'sort_order' => $row['sort_order'],
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }
        // Start transaction using the model's DB instance
        $this->db->transStart();

        // Delete rows using Query Builder
        $this->builder()
             ->where('project_id', $projectId)
             ->delete();

        // 2. Insert new rows in bulk
        if (!empty($newRows)) {
            $this->builder()->insertBatch($data);
        }

        // Complete transaction (automatically commits or rolls back)
        $this->db->transComplete();

        return $this->db->transStatus();
    }
}
