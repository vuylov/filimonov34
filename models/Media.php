<?php

namespace app\models;

use Yii;
use yii\db\Expression;

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
    const FILE_TYPE = 'media';
    public $file; //for file uploads
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
            [['mediatype_id', 'name', 'keywords', 'description_seo'], 'required', 'message' => 'Поле "{attribute}" не может быть пустым'],
            [['mediatype_id', 'user_id'], 'integer'],
            [['description',  'code', 'keywords', 'description_seo'], 'string'],
            [['create_at', 'user_id','thumb', 'active'], 'safe'],
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
            'mediatype_id' => 'Тип медиа',
            'user_id' => 'Добавил',
            'name' => 'Наименование',
            'description' => 'Описание',
            'thumb' => 'Картинка для анонса',
            'code' => 'Код вставки',
            'active' => 'Активность',
            'create_at' => 'Дата создания',
            'keywords' => 'Ключевые слова',
            'description_seo' => 'Описание для SEO',
            'file'  => 'Файлы для загрузки'
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

    public function getFiles()
    {
        return $this->hasMany(File::className(), ['fid' => 'id'])->where(['type' => self::FILE_TYPE]);
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){

            $this->user_id      = Yii::$app->user->id;
            $this->create_at    = new Expression("NOW()");

            return true;
        }
        return false;
    }

    public function getFileType()
    {
        return self::FILE_TYPE;
    }
}
