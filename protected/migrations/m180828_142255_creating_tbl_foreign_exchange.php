<?php

class m180828_142255_creating_tbl_foreign_exchange extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_forex_exchange', array(
			'id' => 'pk',
			'rate'=>'int(11) NOT NULL',			
			'create_time' => 'datetime NOT NULL DEFAULT NOW()',
			'is_active' => "tinyint(1) NOT NULL DEFAULT '1'",
			'is_deleted' => "tinyint(1) NOT NULL DEFAULT '0'",
		), 'ENGINE=InnoDB');
	}

	public function down()
	{
		$this->dropTable('tbl_forex_exchange');
	}

}