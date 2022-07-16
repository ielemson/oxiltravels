<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostTable extends Migration
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
		
			'content' => [
				'type' => 'TEXT',
				'constraint' => '255',
			],
		
			'category_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' =>false,
			],
		
			'file' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'status' => [
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
		$this->forge->createTable('posts');
	}

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
