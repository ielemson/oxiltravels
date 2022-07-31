<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BiodataMigration extends Migration
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
			'user_id'       => [
				'type'       => 'INT',
				'constraint' => 11,
			],
		
			'address' => [
				'type' => 'TEXT',
			],
		
			'state' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'country' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'picture' => [
				'type'           => 'VARCHAR',
				'constraint'     => "255",
				// 'unsigned'       => true,
			],
			'dob' => [
				'type'           => 'VARCHAR',
				'constraint'     => "255",
				// 'unsigned'       => true,
			],
			'education' => [
				'type'           => 'VARCHAR',
				'constraint'     => "255",
				// 'unsigned'       => true,
			],
			'education_yr' => [
				'type'           => 'VARCHAR',
				'constraint'     => "255",
				// 'unsigned'       => true,
			],
			'nexofkin' => [
				'type'           => 'VARCHAR',
				'constraint'     => "255",
				// 'unsigned'       => true,
			],
			'nexofkin_address' => [
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
		$this->forge->createTable('biodata');
	}

	public function down()
	{
		$this->forge->dropTable('biodata');
	}
}
