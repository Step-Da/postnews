<?php
namespace app\models;

use Yii;

/**
 * Класс модели для таблицы "user".
 *
 * @property int $id
 * @property string $username
 * @property string $role
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Article[] $articles
 * @property Image[] $images
 */
class UserTable extends \yii\db\ActiveRecord
{
    /**
     * Получения наименование сущности (таблицы)
     * 
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * Установка правил валидации для полей
     * 
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'role', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['username', 'role', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * Установка наименования полей таблицы в клиентской части
     * 
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор пользователя',
            'username' => 'Наименование пользователя',
            'role' => 'Роль',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Формирование запроса для [[Articles]]
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['id_author' => 'id']);
    }

    /**
     * Формирование запроса для [[Images]]
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['id_user' => 'id']);
    }
}
