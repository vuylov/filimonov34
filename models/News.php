<?php

namespace app\models;

use Yii;
use yii\db\Expression;

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
    const FILE_TYPE = 'news';
    public $file; //use gor thumb upload
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
            [['newstype_id', 'title', 'keywords', 'description_seo'], 'required', 'message' => 'Атрибут "{attribute}" обязателен для заполнения'],
            [['user_id', 'newstype_id', 'active', 'visitors'], 'integer'],
            [['description', 'thumb', 'keywords', 'description_seo', 'brief'], 'string'],
            [['create_at', 'file', 'user_id'], 'safe'],
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
            'user_id' => 'Добавил',
            'newstype_id' => 'Тип новости',
            'active' => 'Активность',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'thumb' => 'Картинка для анонса',
            'visitors' => 'Количество просмотров',
            'create_at' => 'Дата создания',
            'keywords' => 'Ключевые слова',
            'description_seo' => 'Описание для SEO',
            'file'      => 'Загрузка картинки для анонса',
            'brief'     => 'Анонс на главную страницу'
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['fid' => 'id'])->where(['type' => self::FILE_TYPE]);
    }

    public function getFileType()
    {
        return self::FILE_TYPE;
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($this->isNewRecord){
                $this->user_id      = Yii::$app->user->id;
                $this->create_at    = new Expression('NOW()');
            }
            return true;
        }
        return false;
    }

    public function beforeDelete(){
        if(parent::beforeDelete()){
            if($this->thumb){
                $thumb = Yii::getAlias('@webroot').'/upload/news/'.$this->thumb;
                if(file_exists($thumb)){
                    unlink($thumb);
                }
            }
            return true;
        }
        return false;
    }
}
