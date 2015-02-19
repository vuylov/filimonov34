<?php

namespace app\models;

use Yii;
use yii\db\Expression;
/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property integer $fid
 * @property string $type
 * @property string $path
 * @property string $thumb
 * @property string $extension
 * @property string $create_at
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fid', 'path'], 'required'],
            [['fid'], 'integer'],
            [['path', 'thumb'], 'string'],
            [['create_at'], 'safe'],
            [['type', 'extension'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fid' => 'Fid',
            'type' => 'Type',
            'path' => 'Path',
            'thumb' => 'Thumb',
            'extension' => 'Extension',
            'create_at' => 'Create At',
        ];
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($this->isNewRecord){
                $this->create_at    = new Expression('NOW()');
            }
            return true;
        }
        return false;
    }
}
