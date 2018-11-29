<?php

class m171107_163845_creating_gallery extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_albums', array(
			'id' => 'pk',
			'title'=>'string NULL',
			'description'=>'text NULL',
			'path'=>'string NOT NULL',
			'create_time'=>'datetime NOT NULL DEFAULT NOW()',
			'is_active' => "tinyint(1) NOT NULL DEFAULT '1'",
			'is_deleted' => "tinyint(1) NOT NULL DEFAULT '0'",
		), 'ENGINE=InnoDB');

		$this->createTable('tbl_images', array(
			'id' => 'pk',
			'title'=>'string NULL',
			'description'=>'text NULL',
			'full_path'=>'string NOT NULL',
			'file_name'=>'string NOT NULL',
			'album_id'=>'int(11) NOT NULL',
			'create_time'=>'datetime NOT NULL DEFAULT NOW()',
			'is_active' => "tinyint(1) NOT NULL DEFAULT '1'",
			'is_deleted' => "tinyint(1) NOT NULL DEFAULT '0'",
		), 'ENGINE=InnoDB');

		$this->addForeignKey("fk_album_id_images", "tbl_images", "album_id", "tbl_albums", "id", "CASCADE", "RESTRICT");
	}

	public function down()
	{
		$this->dropForeignKey("fk_album_id_images", "tbl_images");
		$this->dropTable('tbl_images');
		$this->dropTable('tbl_albums');
	}
}