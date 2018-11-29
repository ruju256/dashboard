<?php

class m180828_062942_creating_tbl_senders extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_senders', array(
			'id' => 'pk',
			'sender_name'=>'string NOT NULL',			
			'sender_phone_no' => 'string NOT NULL',			
			'amount' => 'int(11) NOT NULL',
			'charges' => 'int(11) NOT NULL',
			'receiver_name' => 'string NOT NULL',
			'receiver_phone_no'=>'string NOT NULL',
			'sender_country'=>'string NOT NULL',
			'receiver_country'=>'string NOT NULL',
			'create_time' => 'datetime NOT NULL DEFAULT NOW()',
			'is_active' => "tinyint(1) NOT NULL DEFAULT '1'",
			'is_deleted' => "tinyint(1) NOT NULL DEFAULT '0'",
		), 'ENGINE=InnoDB');

		$this->createTable('tbl_receivers', array(
			'id' => 'pk',
			'sender_id'=>'int(11) NOT NULL',
			'receiver_name'=>'string NOT NULL',			
			'receiver_phone_no' => 'string NOT NULL',			
			'amount' => 'int(11) NOT NULL',
			'charges' => 'int(11) NOT NULL',
			'sender_name' => 'string NOT NULL',
			'sender_phone_no'=>'string NOT NULL',
			'sender_country'=>'string NOT NULL',
			'receiver_country'=>'string NOT NULL',
			'create_time' => 'datetime NOT NULL DEFAULT NOW()',
			'is_active' => "tinyint(1) NOT NULL DEFAULT '1'",
			'is_deleted' => "tinyint(1) NOT NULL DEFAULT '0'",
		), 'ENGINE=InnoDB');

		$this->addForeignKey("fk_sender_id_receivers", "tbl_receivers", "sender_id", "tbl_senders", "id", "CASCADE", "RESTRICT");
	}

	public function down()
	{
		$this->dropForeignKey("fk_sender_id_receivers","tbl_receivers");
		$this->dropTable('tbl_senders');
		$this->dropTable('tbl_receivers');
	}
}