<?php

use yii\db\Schema;
use yii\db\Migration;

class m150219_075650_create_news_table extends Migration
{
    public function up()
    {
        $this->createTable('news', [
            'id'            => 'pk',
            'user_id'       => Schema::TYPE_INTEGER.' NOT NULL',
            'newstype_id'   => Schema::TYPE_INTEGER.' NOT NULL',
            'active'        => Schema::TYPE_SMALLINT. ' NOT NULL DEFAULT 1',
            'title'         => Schema::TYPE_STRING. ' NOT NULL',
            'description'   => Schema::TYPE_TEXT,
            'thumb'         => Schema::TYPE_TEXT,
            'visitors'      => Schema::TYPE_BIGINT,
            'create_at'     => Schema::TYPE_DATETIME,
            'keywords'      => Schema::TYPE_TEXT.' NOT NULL',
            'description_seo'   => Schema::TYPE_TEXT.' NOT NULL'
        ]);
        $this->addForeignKey('user_news_FK', 'news', 'user_id', 'user', 'id', 'cascade', 'cascade');
        $this->addForeignKey('type_news_FK', 'news', 'newstype_id', 'newstype', 'id', 'cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('type_news_FK', 'news');
        $this->dropForeignKey('user_news_FK', 'news');
        $this->dropTable('news');
    }
}
