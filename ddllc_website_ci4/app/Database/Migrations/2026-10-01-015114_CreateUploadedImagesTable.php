<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUploadedImagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'image_path' => ['type' => 'VARCHAR', 'constraint' => 2048],
            'file_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'mime_type' => ['type' => 'VARCHAR', 'constraint' => 50],
            'file_size' => ['type' => 'INT'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('uploaded_images');
    }

    public function down()
    {
        $this->forge->dropTable('uploaded_images');
    }
}
