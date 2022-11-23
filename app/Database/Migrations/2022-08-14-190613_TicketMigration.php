<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TicketMigration extends Migration
{
    public function up()
    {
      $this->forge->addField([
        'id' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
        ],
        'user_email'=>[
            'type'=>'VARCHAR',
            'constraint'=>'255'
        ],
        'status'=>[
            'type'=>'INT',
            'constraint'=> 11,
            'default' => 0
        ],
        'subject'=>[
            'type'=>'VARCHAR',
            'constraint'=>'255'
        ],
        'content'=>[
            'type'=>'TEXT'
        ],
        'created_at' => [
            'type'           => 'datetime'
        ],
        'updated_at' => [
            'type'           => 'datetime'
        ],
      ]);
      $this->forge->addKey('id',true);
      $this->forge->createTable('tickets');
      
    }

    public function down()
    {
        $this->forge->dropTable('tickets');
    }
}
