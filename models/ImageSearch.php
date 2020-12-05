<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Image;

/**
 * Модель для поиска даннных на основе [`app\models\Image`]
 * 
 */
class ImageSearch extends Image
{
    /**
     *  Установка правил валидации для полей
     * 
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdImage', 'size', 'id_user'], 'integer'],
            [['nameImage', 'pathImage', 'type'], 'safe'],
        ];
    }

    /**
     * Установка сценария работы модели поиска
     * 
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Создание экземпляра поставщика данных с примененным поисковым запросом
     * 
     * @param array $params*
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Image::find()->where(['id_user' => Yii::$app->user->identity->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'IdImage' => $this->IdImage,
            'size' => $this->size,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'nameImage', $this->nameImage])
            ->andFilterWhere(['like', 'pathImage', $this->pathImage])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}