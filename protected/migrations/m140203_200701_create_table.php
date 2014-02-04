<?php

class m140203_200701_create_table extends CDbMigration
{
	public function up()
	{
		 $this->createTable('notes', array(
            'id' => 'pk',
            'notes_name' => 'text',
            'notes_value' => 'text',
            'notes_author'=>'text',
            'notes_update'=>'DATETIME',
           
        ));
	}

	public function down()
	{
		$this->dropTable('notes');
		return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}