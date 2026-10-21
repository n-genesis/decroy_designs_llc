<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InsertSeeder extends Seeder
{
    public function run()
    {
        // Run Seeders
        $this->call('AdminSeeder');
        $this->call('PageSeeder');
        $this->call('UploadedImagesSeeder');
        $this->call('ProjectsSeeder');
        $this->call('ProjectsImageSeeder');
    }
}
