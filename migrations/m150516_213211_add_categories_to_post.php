<?php

use yii\db\Schema;
use yii\db\Migration;

class m150516_213211_add_categories_to_post extends Migration
{
    public function up()
    {
        $this->addColumn('posts', 'category', 'INT' );

        return true;
    }

    public function down()
    {

        $this->dropColumn('posts', 'category');

        return true;
    }

}
