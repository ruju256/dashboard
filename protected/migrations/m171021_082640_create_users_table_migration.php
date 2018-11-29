<?php

class m171021_082640_create_users_table_migration extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_roles', array(
			'id' => 'pk',
			'name'=>'string NOT NULL',
			'is_active' => "tinyint(1) NOT NULL DEFAULT '1'",
			'is_deleted' => "tinyint(1) NOT NULL DEFAULT '0'",
		), 'ENGINE=InnoDB');

		$this->insert('tbl_roles', array('name'=>'admin'));
		$this->insert('tbl_roles', array('name'=>'user'));

		$this->createTable('tbl_users', array(
			'id' => 'pk',
			'first_name'=>'string NOT NULL',			
			'email' => 'string NOT NULL unique',			
			'password' => 'string NOT NULL',
			'role_id' => 'int(11) NOT NULL',
			'create_time' => 'datetime NOT NULL DEFAULT NOW()',
			'is_active' => "tinyint(1) NOT NULL DEFAULT '1'",
			'is_deleted' => "tinyint(1) NOT NULL DEFAULT '0'",
		), 'ENGINE=InnoDB');

		$this->addForeignKey("fk_role_id_users", "tbl_users", "role_id", "tbl_roles", "id", "CASCADE", "RESTRICT");
	}

	public function down()
	{
		$this->dropForeignKey("fk_role_id_users","tbl_users");
		$this->dropTable('tbl_users');
		$this->dropTable('tbl_roles');
	}

}