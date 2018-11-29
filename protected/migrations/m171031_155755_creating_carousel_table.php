<?php

class m171031_155755_creating_carousel_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_carousels', array(
			'id' => 'pk',
			'title'=>'string NULL',
			'description'=>'text NULL',
			'img'=>'string NOT NULL',
			'is_active' => "tinyint(1) NOT NULL DEFAULT '1'",
			'is_deleted' => "tinyint(1) NOT NULL DEFAULT '0'",
		), 'ENGINE=InnoDB');
	}

	public function down()
	{
		$this->dropTable('tbl_carousels');
	}
}