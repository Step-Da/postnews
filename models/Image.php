<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $nameImage
 * @property string $pathImage
 * @property string $type
 */
class Image extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nameImage', 'pathImage', 'type'], 'required'],
            [['nameImage', 'pathImage'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nameImage' => 'Name Image',
            'pathImage' => 'Path Image',
            'type' => 'Type',
        ];
    }
}
