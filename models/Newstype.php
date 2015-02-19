<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "newstype".
 *
 * @property integer $id
 * @property string $name
 *
 * @property News[] $news
 */
class Newstype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newstype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required', 'message' => '{attribute} не может быть пустым'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование типа',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['newstype_id' => 'id']);
    }
}
