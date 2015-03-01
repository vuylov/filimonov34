<?php
use yii\db\Migration;

class m150219_101914_Add_admin_user_row extends Migration
{
    public function up()
    {
        $this->insert('user', [
            'name'      => 'Вуйлов Дмитрий Андреевич',
            'email'     => 'vuylov@gmail.com',
            'password'  => Yii::$app->security->generatePasswordHash('power2008', 5),
            'role'      => 1,
        ]);
    }

    public function down()
    {
        $this->delete('user', 'email = :email', [':email' => 'vuylov@gmail.com']);
    }
}
