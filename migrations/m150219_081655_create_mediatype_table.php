<?php

use yii\db\Schema;
use yii\db\Migration;

class m150219_081655_create_mediatype_table extends Migration
{
    public function up()
    {
        $this->createTable('mediatype', [
            'id'    => 'pk',
            'name'  => Schema::TYPE_STRING. ' NOT NULL'
        ]);
    }
    public function down()
    {
        $this->dropTable('mediatype');
    }
}
