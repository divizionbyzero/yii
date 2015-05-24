<?php

use yii\db\Schema;
use yii\db\Migration;

class m150516_214538_add_fk_posts_categories extends Migration
{
    public function up()
    {
        return $this->addForeignKey('fk_categories', 'posts', 'category', 'categories', 'id', 'CASCADE');

    }

    public function down()
    {
        return $this->dropForeignKey( 'fk_categories', 'posts' );
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
