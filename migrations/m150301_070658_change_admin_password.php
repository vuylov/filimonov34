<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\User;

class m150301_070658_change_admin_password extends Migration
{
    public function up()
    {
        $admin = User::find()->where('email = :e', [':e' => 'vuylov@gmail.com'])->one();
        $admin->password = Yii::$app->security->generatePasswordHash('power2008', 5);
        $admin->save();
    }

    public function down()
    {
        echo "m150301_070658_change_admin_password cannot be reverted.\n";
        return false;
    }
}
