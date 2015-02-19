<?php

use yii\db\Schema;
use yii\db\Migration;

class m150219_083520_create_file_table extends Migration
{
    public function up()
    {
        $this->createTable('file', [
            'id'        => 'pk',
            'fid'       => Schema::TYPE_INTEGER.' NOT NULL',
            'type'      => Schema::TYPE_STRING,
            'path'      => Schema::TYPE_TEXT. ' NOT NULL',
            'thumb'     => Schema::TYPE_TEXT,
            'extension' => Schema::TYPE_STRING,
            'create_at' => Schema::TYPE_DATETIME
        ]);
    }

    public function down()
    {
        $this->dropTable('file');
    }
}
