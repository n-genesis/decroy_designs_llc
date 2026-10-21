<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class ProjectsSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $projectData = [
            [
                'id' => 1,
                'name' => 'Riverside Highway',
                'slug' => 'riverside-highway',
                'type' => 'Contruction',
                'metadata' => 'custom, knoxville, paint',
                'description' => "Major bridge connecting the northern corridor",
                'project_content' => '<p class="summary">
                Coordinating construction within a dense metropolitan core presented significant logistical hurdles. Limited staging areas, noise restrictions during peak hours, and the need to maintain pedestrian access around the site required meticulous scheduling. Additionally, integrating a seismic-resistant foundation into existing underground infrastructure demanded novel engineering solutions. 
                </p>
                <p>
                The Meridian Corporate Tower spans 32 floors across a 2.5-acre urban footprint. Featuring floor-to-ceiling glass facades, collaborative workspaces, and integrated smart building technology, the structure was delivered in 22 months. Every phase adhered to rigorous sustainability benchmarks and international safety protocols.
                </p>',
                'project_details' => '<div class="client-card mb-5" data-aos="fade-left" data-aos-delay="300">
            <h4>Client Details</h4>
            <ul>
                <li>
                <span class="label">Organization</span>
                <span class="value">Vertex Construction Group</span>
                </li>
                <li>
                <span class="label">Sector</span>
                <span class="value">Commercial</span>
                </li>
                <li>
                <span class="label">Region</span>
                <span class="value">Knoxville, TN</span>
                </li>
            </ul>
            </div><!-- End Client Card -->

            <div class="capabilities-card" data-aos="fade-left" data-aos-delay="250">
            <h4>Capabilities Delivered</h4>
            <div class="capability-tags">
                <span class="cap-tag"><i class="bi bi-vector-pen"></i> Blueprint Design</span>
                <span class="cap-tag"><i class="bi bi-bricks"></i> Structural Work</span>
                <span class="cap-tag"><i class="bi bi-clipboard-check"></i> Site Supervision</span>
                <span class="cap-tag"><i class="bi bi-palette"></i> Interior Buildout</span>
                <span class="cap-tag"><i class="bi bi-shield-check"></i> Compliance Review</span>
            </div>
            </div><!-- End Capabilities Card -->',
                'image_path' => 'uploads/images/pro1-001.jpg',
                'visibility' => 'published', 
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => Time::yesterday(),
            ],
            [
                'id' => 2,
                'name' => 'Sunset Ridge Road',
                'slug' => 'sunset-ridge-road',
                'type' => 'Renovations',
                'metadata' => 'custom, knoxville, paint',
                'description' => "Multi-level retail destination with modern amenities",
                'project_content' => '<p class="summary">
                A landmark commercial development integrating cutting-edge design principles with eco-conscious construction methods, tailored for forward-thinking enterprises.
                </p>
                <p>
                The Meridian Corporate Tower spans 32 floors across a 2.5-acre urban footprint. Featuring floor-to-ceiling glass facades, collaborative workspaces, and integrated smart building technology, the structure was delivered in 22 months. Every phase adhered to rigorous sustainability benchmarks and international safety protocols.
                </p>',
                'project_details' => '<div class="client-card mb-5" data-aos="fade-left" data-aos-delay="300">
            <h4>Client Details</h4>
            <ul>
                <li>
                <span class="label">Organization</span>
                <span class="value">Personal Construction</span>
                </li>
                <li>
                <span class="label">Sector</span>
                <span class="value">Private</span>
                </li>
                <li>
                <span class="label">Region</span>
                <span class="value">Knoxville, TN</span>
                </li>
            </ul>
            </div><!-- End Client Card -->

            <div class="capabilities-card" data-aos="fade-left" data-aos-delay="250">
            <h4>Capabilities Delivered</h4>
            <div class="capability-tags">
                <span class="cap-tag"><i class="bi bi-vector-pen"></i> Blueprint Design</span>
                <span class="cap-tag"><i class="bi bi-bricks"></i> Structural Work</span>
                <span class="cap-tag"><i class="bi bi-clipboard-check"></i> Site Supervision</span>
                <span class="cap-tag"><i class="bi bi-palette"></i> Interior Buildout</span>
                <span class="cap-tag"><i class="bi bi-shield-check"></i> Compliance Review</span>
            </div>
            </div><!-- End Capabilities Card -->',
                'image_path' => 'uploads/images/pro2-001.jpg',
                'visibility' => 'published', 
                'created_at' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
                'updated_at' => Time::yesterday(),
            ],
        ];

        $this->db->table('projects')->insertBatch($projectData);
    }
}
