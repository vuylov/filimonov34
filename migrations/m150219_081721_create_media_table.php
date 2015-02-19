<?php

use yii\db\Schema;
use yii\db\Migration;

class m150219_081721_create_media_table extends Migration
{
    public function up()
    {
        $this->createTable('media', [
            'id'                => 'pk',
            'mediatype_id'      => Schema::TYPE_INTEGER. ' NOT NULL',
            'user_id'           => Schema::TYPE_INTEGER. ' NOT NULL',
            'name'              => Schema::TYPE_STRING. ' NOT NULL',
            'description'       => Schema::TYPE_TEXT,
            'thumb'             => Schema::TYPE_TEXT,
            'code'              => Schema::TYPE_TEXT,
            'active'            => Schema::TYPE_SMALLINT. ' NOT NULL DEFAULT 1',
            'create_at'         => Schema::TYPE_DATETIME,
            'keywords'          => Schema::TYPE_TEXT,
            'description_seo'   => Schema::TYPE_TEXT
        ]);

        $this->addForeignKey('media_type_FK', 'media', 'mediatype_id', 'mediatype', 'id', 'cascade', 'cascade');
        $this->addForeignKey('media_user_FK', 'media', 'user_id', 'user', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('media_user_FK', 'media');
        $this->dropForeignKey('media_type_FK', 'media');
        $this->dropTable('media');
    }
}
