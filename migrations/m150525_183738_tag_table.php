<?php

use yii\db\Schema;
use yii\db\Migration;

class m150525_183738_tag_table extends Migration
{
    public function up()
    {
        $this->createTable('tags', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'frequency' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
        ]);
    }

    public function down()
    {
        return $this->dropTable('tags');
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
