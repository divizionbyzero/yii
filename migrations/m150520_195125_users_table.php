<?php

use yii\db\Schema;
use yii\db\Migration;

class m150520_195125_users_table extends Migration
{
    public function up()
    {
        return $this->createTable('users', array(
            'id' => 'INT PRIMARY KEY AUTO_INCREMENT',
            'username' => 'VARCHAR(100) NOT NULL',
            'password' => 'VARCHAR(128) NOT NULL',
            'email' => 'VARCHAR(100)',
            'role' => 'INT(1) NOT NULL DEFAULT 0',
            'auth_key' => 'VARCHAR(32) NOT NULL',
        ));
    }

    public function down()
    {
        return $this->dropTable('users');
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
