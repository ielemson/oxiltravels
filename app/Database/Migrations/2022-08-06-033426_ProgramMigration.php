<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProgramMigration extends Migration
{



    public function up()
	{
      
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			
		
			'title' => [
				'type' => 'VARCHAR',
                'constraint'     => "255",
			],
			'slug' => [
				'type' => 'VARCHAR',
                'constraint'     => "255",
			],
			'status' => [
				'type' => 'VARCHAR',
                'constraint'     => "255",
			],
		
			'start_date' => [
				'type' => 'datetime',
			],
			'end_date' => [
				'type' => 'datetime',
			],
			'pricing' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'price' => [
				'type'           => 'FLOAT',
			],
			'details' => [
				'type'           => 'TEXT',
			],
			'img' => [
				'type'           => 'VARCHAR',
				'constraint'     => "255",
				// 'unsigned'       => true,
			],
			
			'created_at' => [
				'type'           => 'datetime'
			],
			'updated_at' => [
				'type'           => 'datetime'
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('programs');
	}

	public function down()
	{
		$this->forge->dropTable('programs');
	}
}
