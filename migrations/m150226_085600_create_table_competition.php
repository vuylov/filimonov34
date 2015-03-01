<?php

use yii\db\Schema;
use yii\db\Migration;

class m150226_085600_create_table_competition extends Migration
{
    public function up()
    {
        $this->createTable('competition', [
            'id'        => 'pk',
            'name'      => Schema::TYPE_TEXT,
            'url'       => Schema::TYPE_TEXT,
            'date_at'   => Schema::TYPE_DATE,
            'create_at' => Schema::TYPE_DATETIME
        ]);
    }

    public function down()
    {
        $this->dropTable('competition');
    }
}
