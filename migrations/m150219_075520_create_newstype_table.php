<?php

use yii\db\Schema;
use yii\db\Migration;

class m150219_075520_create_newstype_table extends Migration
{
    public function up()
    {
        $this->createTable('newstype', [
            'id'        => 'pk',
            'name'      => Schema::TYPE_STRING.' NOT NULL'
        ]);
    }

    public function down()
    {
        $this->dropTable('newstype');
    }
}
