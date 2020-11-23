<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "article".
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
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'text', 'id_author', 'status'], 'required'],
            [['id_author', 'status'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['text'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['id_author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_author' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idArticle' => 'Уникальный номер статьи',
            'name' => 'Наименование статьи',
            'text' => 'Text',
            'id_author' => 'Автор',
            'status' => 'Стаус',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_author']);
    }
}
