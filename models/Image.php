<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Класс модели для таблицы "image".
 *
 * @property int $id
 * @property string $nameImage
 * @property string $pathImage
 * @property string $type
 */
class Image extends ActiveRecord
{
    /**
     * Получения наименование сущности (таблицы)
     * 
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * Установка правил валидации для полей
     * 
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
     * Установка наименования полей таблицы в клиентской части
     * 
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nameImage' => 'Наименование изображения',
            'pathImage' => 'Превью изображения',
            'type' => 'Тип изображения',
            'size' => 'Размер изображения (KB)'
        ];
    }
}
