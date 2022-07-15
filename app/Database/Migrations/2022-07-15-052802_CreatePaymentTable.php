<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePaymentTable extends Migration
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
			'name'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'phone'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'dob'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'gender'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
		
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
		
			'education' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'education_yr' => [
				'type'           => 'VARCHAR',
				'constraint'     => "255",
				// 'unsigned'       => true,
			],
			'kin' => [
				'type'           => 'VARCHAR',
				'constraint'     => "255",
				// 'unsigned'       => true,
			],
			'kin_address' => [
				'type'           => 'VARCHAR',
				'constraint'     => "255",
				// 'unsigned'       => true,
			],
			'payment' => [
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
		$this->forge->createTable('payments');
	}

	public function down()
	{
		$this->forge->dropTable('payments');
	}
}
