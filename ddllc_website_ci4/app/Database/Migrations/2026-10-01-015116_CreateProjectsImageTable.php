<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjectsImageTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'project_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
            'image_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true ],
            'image_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'sort_order' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => 0 ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('project_id');
        $this->forge->addForeignKey('project_id', 'projects', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('image_id', 'uploaded_images', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('projects_image');
    }

    public function down()
    {
        $this->forge->dropTable('projects_image');
    }
}
