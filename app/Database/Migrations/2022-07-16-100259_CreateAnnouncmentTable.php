<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnnouncmentTable extends Migration
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
			'title'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
		
			'status' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => false,
			],
		
			'announcement' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'img' => [
				'type'           => 'VARCHAR',
				'constraint'     => "255",
				// 'unsigned'       => true,
			],
			'slug' => [
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
		$this->forge->createTable('announcements');
	}

	public function down()
	{
		$this->forge->dropTable('announcements');
	}
}
