<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $newstype_id
 * @property integer $active
 * @property string $title
 * @property string $description
 * @property string $thumb
 * @property string $visitors
 * @property string $create_at
 * @property string $keywords
 * @property string $description_seo
 *
 * @property Newstype $newstype
 * @property User $user
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'newstype_id', 'title', 'keywords', 'description_seo'], 'required'],
            [['user_id', 'newstype_id', 'active', 'visitors'], 'integer'],
            [['description', 'thumb', 'keywords', 'description_seo'], 'string'],
            [['create_at'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'newstype_id' => 'Newstype ID',
            'active' => 'Active',
            'title' => 'Title',
            'description' => 'Description',
            'thumb' => 'Thumb',
            'visitors' => 'Visitors',
            'create_at' => 'Create At',
            'keywords' => 'Keywords',
            'description_seo' => 'Description Seo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewstype()
    {
        return $this->hasOne(Newstype::className(), ['id' => 'newstype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
