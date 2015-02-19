<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "media".
 *
 * @property integer $id
 * @property integer $mediatype_id
 * @property integer $user_id
 * @property string $name
 * @property string $description
 * @property string $thumb
 * @property string $code
 * @property integer $active
 * @property string $create_at
 * @property string $keywords
 * @property string $description_seo
 *
 * @property User $user
 * @property Mediatype $mediatype
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mediatype_id', 'user_id', 'name'], 'required'],
            [['mediatype_id', 'user_id', 'active'], 'integer'],
            [['description', 'thumb', 'code', 'keywords', 'description_seo'], 'string'],
            [['create_at'], 'safe'],
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
            'mediatype_id' => 'Mediatype ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'description' => 'Description',
            'thumb' => 'Thumb',
            'code' => 'Code',
            'active' => 'Active',
            'create_at' => 'Create At',
            'keywords' => 'Keywords',
            'description_seo' => 'Description Seo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediatype()
    {
        return $this->hasOne(Mediatype::className(), ['id' => 'mediatype_id']);
    }
}
