<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 25.02.2015
 * Time: 14:26
 */

namespace app\components;

use Yii;
use app\models\Competition;
use yii\helpers\VarDumper;

class Calendar {

    public static function getItems()
    {
        $currentDay     = date('yyyy-MM-dd');
        $competitions   = Competition::find()->where('date_at > :currentDate', [':currentDate' => $currentDay])->limit(5)->all();
        return Yii::$app->view->renderFile('@app/views/competition/_items.php', ['competitions' => $competitions]);
    }
}