<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Project as ProjectEntity;

class ProjectModel extends Model
{
    protected $table            = 'projects';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = ProjectEntity::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'slug',
        'type',
        'metadata',
        'description',
        'project_content',
        'project_details',
        'image_path',
        'visibility',
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
    protected $validationRules = [
        'id'              => 'permit_empty|is_natural_no_zero',
        'name'            => 'required|min_length[3]|max_length[145]',
        'slug'            => 'required|max_length[128]|regex_match[/^[a-z0-9-]+$/]|is_unique[projects.slug,id,{id}]',
        'type'            => 'permit_empty|max_length[145]',
        'description'     => 'permit_empty|max_length[255]',
        'image_path'      => 'permit_empty|max_length[255]',
        'visibility'      => 'required|in_list[draft,published]',
    ];
    protected $validationMessages = [
        'slug' => [
            'is_unique' => 'This project URL slug is already taken.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['generateSlug'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['generateSlug'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getProjects(): array
    {
        return $this->select('projects.*, projects.id as project_id')->where('visibility', 'published')
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    protected function generateSlug(array $data): array
    {
        if (!isset($data['data']['slug']) || $data['data']['slug'] === '') {
            if (empty($data['data']['name'])) {
                return $data;
            }

            helper('url');
            $baseSlug = mb_url_title($data['data']['name'], '-', true);
            $slug = $baseSlug;
            $suffix = 1;
            $id = $data['id'] ?? null;

            $query = $this->where('slug', $slug);
            if ($id !== null) {
                $query->where('id !=', $id);
            }

            while ($query->first() !== null) {
                $slug = $baseSlug . '-' . $suffix++;
                $query = $this->where('slug', $slug);
                if ($id !== null) {
                    $query->where('id !=', $id);
                }
            }

            $data['data']['slug'] = $slug;
        }

        return $data;
    }
}
