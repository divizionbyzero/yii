<?php

use yii\db\Schema;
use yii\db\Migration;

class m150516_110059_posts extends Migration
{
    public function up()
    {
        return $this->createTable('posts', array(
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'title' => 'VARCHAR(255)',
            'body' => 'TEXT',
            'created' => 'INT',
            'updated' => 'INT'
        ));
    }

    public function down()
    {
        return $this->dropTable('posts');
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
