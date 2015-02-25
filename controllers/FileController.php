<?php

namespace app\controllers;
use yii\filters\AccessControl;
use app\models\File;

class FileController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access'    => [
                'class' => AccessControl::className(),
                'only'  => ['delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],

        ];
    }
    public function actionDelete($id = null)
    {
        //return $this->render('delete');
        if(is_null($id)){
            echo "ID файла не указано";
        }
        $file = File::findOne($id);
        if($file){
            if($file->delete()){
                echo 'Файл успешно удален';
            }
        }else{
            echo 'Файл не найден';
        }
    }

}
