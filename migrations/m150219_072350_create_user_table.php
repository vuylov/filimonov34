<?php

use yii\db\Schema;
use yii\db\Migration;

class m150219_072350_create_user_table extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id'        => 'pk',
            'name'      => Schema::TYPE_STRING.' NOT NULL',
            'email'     => Schema::TYPE_STRING.' NOT NULL',
            'password'  => Schema::TYPE_STRING.' NOT NULL',
            'role'      => Schema::TYPE_SMALLINT.' DEFAULT 0',
            'last_visit'=> Schema::TYPE_DATETIME
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
