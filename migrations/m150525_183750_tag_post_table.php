<?php

use yii\db\Schema;
use yii\db\Migration;

class m150525_183750_tag_post_table extends Migration
{
    public function up()
    {
        $this->createTable('posts_tags', [
            'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'tag_id' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addPrimaryKey('', 'posts_tags', ['post_id', 'tag_id']);
    }

    public function down()
    {
        return $this->dropTable('posts_tags');
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
