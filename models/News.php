<?php
namespace app\models;

use Yii;

/**
 * Класс модели для таблицы "news".
 *
 * @property int $idArticle
 * @property string $name
 * @property string $text
 * @property string $username
 * @property int $status
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * Получения наименование сущности (таблицы)
     * 
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * Установка правил валидации для полей
     * 
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idArticle', 'status'], 'integer'],
            [['name', 'text', 'username', 'status'], 'required'],
            [['name'], 'string', 'max' => 30],
            [['text', 'username'], 'string', 'max' => 255],
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
            'idArticle' => 'Id Article',
            'name' => 'Name',
            'text' => 'Text',
            'username' => 'Username',
            'status' => 'Status',
        ];
    }
}