<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMerchantsTable extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'merchant_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'category_id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'merchant_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'merchant_address' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'     => TRUE,
			],
			'merchant_phone'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'merchant_email'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'     => TRUE,
			],
			'merchant_slug'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'merchant_img' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'     => TRUE,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'     => TRUE,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'     => TRUE,
			],
		]);
		$this->forge->addPrimaryKey('merchant_id');
		$this->forge->addKey('category_id');
		$this->forge->createTable('merchants');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
		$this->forge->dropTable('merchants');
	}
}
