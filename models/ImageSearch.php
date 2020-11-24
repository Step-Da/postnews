<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Image;

/**
 * ImageSearch represents the model behind the search form of `app\models\Image`.
 */
class ImageSearch extends Image
{
    /**
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
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
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
