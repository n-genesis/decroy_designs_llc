<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\UploadedImages as UploadedImagesEnitiy;

class UploadedImagesModel extends Model
{
    protected $table            = 'uploaded_images';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = UploadedImagesEnitiy::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'image_path',
        'file_name',
        'mime_type',
        'file_size',
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

    public function getImageById(int $projectId)
    {
        return $this->where('id', $projectId)->first();
    }

    public function getUploadedImages(){
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    public function saveImage(array $file)
    {
        // Check if the record already exists for this notebook_id
        if (!$this->where('file_name', $file['file_name'])->find()) {
            // Insert a brand new row
            return $this->insert($file);
        }
    }

    public function deleteImageById(int $imageId)
    {
        return $this->delete($imageId);
    }

}
