<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        //
    }

    public function down()
    {
        $this->db->disableForeignKeyChecks();

        $this->db->table('users')->truncate();
        $this->db->table('auth_identities')->truncate();
        $this->db->table('auth_groups_users')->truncate();
        $this->db->table('auth_logins')->truncate();
        $this->db->table('settings')->truncate();

        $this->db->enableForeignKeyChecks();
        
    }
}
