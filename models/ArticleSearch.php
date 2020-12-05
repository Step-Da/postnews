<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

/**
 * Модель для поиска даннных на основе [`app\models\Article`]
 * 
 */
class ArticleSearch extends Article
{
    /**
     * Установка правил валидации для полей
     * 
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idArticle', 'id_author', 'status'], 'integer'],
            [['name', 'text'], 'safe'],
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
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'idArticle' => $this->idArticle,
            'id_author' => $this->id_author,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}