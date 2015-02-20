<?php

use yii\db\Schema;
use yii\db\Migration;

class m150220_091333_add_column_brief_to_news extends Migration
{
    public function up()
    {
        $this->addColumn('news', 'brief', Schema::TYPE_TEXT.' AFTER title');
    }

    public function down()
    {
       $this->dropColumn('news', 'brief');
    }
}
