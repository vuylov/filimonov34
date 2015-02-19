<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\web\MethodNotAllowedHttpException;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property integer $role
 * @property string $last_visit
 *
 * @property Media[] $media
 * @property News[] $news
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password'], 'required'],
            [['role'], 'integer'],
            [['last_visit'], 'safe'],
            [['name', 'email', 'password'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'email' => 'Email',
            'password' => 'Пароль',
            'role' => 'Роль',
            'last_visit' => 'Дата последнего визита',
        ];
    }

    /**
     * Finds an identity by the given ID
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @exception ErrorException
     */
    public function getAuthKey()
    {
        throw new MethodNotAllowedHttpException("Method not supported in User module");
    }
    /**
     * Finds an identity by the given token
     *
     * @throws MethodNotAllowedHttpException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new MethodNotAllowedHttpException("Method not supported in User module");
    }
    /**
     * @throws MethodNotAllowedHttpException
     */
    public function validateAuthKey($authKey)
    {
        throw new MethodNotAllowedHttpException("Method not supported in User module");
    }

    /**
     * Find a user by email
     *
     * @param string $email email of user
     * @return User user object
     */
    public static function findUserByEmail($email)
    {
        return static::find()->where(['email' => $email])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedia()
    {
        return $this->hasMany(Media::className(), ['user_id' => 'id']);
    }

    /**
     * Validate password
     *
     * @param string $password given by user
     * @return boolean response
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['user_id' => 'id']);
    }
}
