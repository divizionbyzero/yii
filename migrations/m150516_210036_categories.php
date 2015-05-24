<?php

use yii\db\Schema;
use yii\db\Migration;

class m150516_210036_categories extends Migration
{
    public function up()
    {
        return $this->createTable('categories', array(
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'parent_id' => 'INT',
            'name' => 'VARCHAR(255)',
        ));
    }

    public function down()
    {
        return $this->dropTable('categories');
    }


    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
