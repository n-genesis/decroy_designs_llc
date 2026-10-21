<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProjectsImageSeeder extends Seeder
{
    public function run() {

        $ImagesData = [
            [
                'project_id' => 1, 
                'image_id' => 1, 
                'image_name' => 'Outside Image 1',
                'sort_order' => 1,
                'created_at' => Time::now()->toDateTimeString(),
            ],
            [
                'project_id' => 1, 
                'image_id' => 2, 
                'image_name' => 'Outside Image 2',
                'sort_order' => 2,
                'created_at' => Time::now()->toDateTimeString(),
            ],
            [
                'project_id' => 1, 
                'image_id' => 3, 
                'image_name' => 'Outside Image 3',
                'sort_order' => 3,
                'created_at' => Time::now()->toDateTimeString(),
            ],
            [
                'project_id' => 1, 
                'image_id' => 4, 
                'image_name' => 'Outside Image 4',
                'sort_order' => 4,
                'created_at' => Time::now()->toDateTimeString(),
            ],
            // Project Article Two (2)
            [
                'project_id' => 2, 
                'image_id' => 1, 
                'image_name' => 'Image 2',
                'sort_order' => 1,
                'created_at' => Time::now()->toDateTimeString(),
            ],
            [
                'project_id' => 2, 
                'image_id' => 2, 
                'image_name' => 'Image 4',
                'sort_order' => 3,
                'created_at' => Time::now()->toDateTimeString(),
            ],
            [
                'project_id' => 2, 
                'image_id' => 3, 
                'image_name' => 'Image 5', 
                'sort_order' => 4,
                'created_at' => Time::now()->toDateTimeString(),
            ],
            [
                'project_id' => 2, 
                'image_id' => 4, 
                'image_name' => 'Image 6', 
                'sort_order' => 5,
                'created_at' => Time::now()->toDateTimeString(),
            ],
            [
                'project_id' => 2, 
                'image_id' => 5, 
                'image_name' => 'Image 7',
                'sort_order' => 6, 
                'created_at' => Time::now()->toDateTimeString(),
            ],
            [
                'project_id' => 2, 
                'image_id' => 6, 
                'image_name' => 'Image 8',
                'sort_order' => 7,
                'created_at' => Time::now()->toDateTimeString(),
            ],
        ];

        $this->db->table('projects_image')->insertBatch($ImagesData);
    }
}
