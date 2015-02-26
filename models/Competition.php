<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "competition".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $date_at
 * @property string $create_at
 */
class Competition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'competition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'date_at'], 'required', 'message' => 'Поле "{attribute}" обязательно для заполнения'],
            [['name', 'url'], 'string'],
            [['create_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'url' => 'Ссылка',
            'date_at' => 'Дата проведения',
            'create_at' => 'Добавлено',
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){

            if($this->isNewRecord){
                $this->create_at = new Expression("NOW()");
            }
            return true;
        }
        return false;
    }
}
