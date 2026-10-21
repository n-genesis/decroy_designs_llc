<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\Page as PageEntity;

class PageModel extends Model
{
    protected $table            = 'pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = PageEntity::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'title', 
        'slug', 
        'content', 
        'visibility'
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
        'id'    => 'permit_empty|is_natural_no_zero',
        'title'   => 'required|min_length[3]|max_length[255]',
        'slug'    => 'required|regex_match[/^[a-z0-9-]+$/]|is_unique[pages.slug,id,{id}]',
        'content' => 'permit_empty',
        'visibility'  => 'required|in_list[draft,published]',
    ];

    protected $validationMessages = [
        'slug' => [
            'is_unique' => 'This page URL slug is already taken.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = ['generateSlug'];
    protected $afterInsert = [];
    protected $beforeUpdate = ['generateSlug'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Generate a slug from the title
     * Seemed easiest/best to put the mechanics here
     * @param array $data
     * @return array
     */
    protected function generateSlug(array $data)
    {
        if (!$data['data']['slug'] && isset($data['data']['title'])) {
            // Retrieve the ID(s) being updated
            // It is typically an array of IDs: [0 => 123]
            if (isset($data['id'])) {
                $id = is_array($data['id']) ? $data['id'][0] : $data['id'];
            } else {
                $id = null;
            }
            helper('url');
            $baseSlug = mb_url_title($data['data']['title'], '-', true);
            $slug = $baseSlug;
            $count = 1;

            // Check for uniqueness in the database
            // Does the slug exist and NOT the current row being updated 
            while ($this->where('id !=', $id)->where('slug', $slug)->first()) {
                $slug = $baseSlug . '-' . $count++;
            }

            $data['data']['slug'] = $slug;
        }
        return $data;
    }
    
}
