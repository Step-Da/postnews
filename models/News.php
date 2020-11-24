<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
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
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
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
