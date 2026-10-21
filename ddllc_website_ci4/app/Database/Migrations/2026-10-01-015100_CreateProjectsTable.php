<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 145, 'null' => false],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 128],
            'type' => ['type' => 'VARCHAR', 'constraint' => 145, 'null' => true],
            'metadata' => ['type' => 'TEXT', 'default' => null, 'null' => true],
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'project_content' => ['type' => 'TEXT', 'default' => null, 'null' => true],
            'project_details' => ['type' => 'TEXT', 'default' => null, 'null' => true],
            'image_path'=> ['type' => 'VARCHAR', 'constraint' => 255, 'default' => null, 'null' => true],
            'visibility' => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'published'],
                'default'    => 'draft',
            ],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('projects');
    }

    public function down()
    {
        $this->forge->dropTable('projects');
    }
}
