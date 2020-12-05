<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Класс модели для таблицы "article".
 *
 * @property int $idArticle
 * @property string $name
 * @property string $text
 * @property int $id_author
 * @property int $status
 *
 * @property User $author
 */
class Article extends ActiveRecord
{
    /**
     * Получения наименование сущности (таблицы)
     * 
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * Установка правил валидации для полей
     * 
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'id_author', 'status'], 'required'],
            [['id_author', 'status'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['text'], 'string',],
            [['name'], 'unique'],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_author' => 'id']],
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
            'idArticle' => 'Уникальный номер статьи',
            'name' => 'Наименование статьи',
            'text' => 'поле дял текса статьи',
            'id_author' => 'Автор',
            'status' => 'Стаус',
        ];
    }

    /**
     * Формирование запроса для [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_author']);
    }
}