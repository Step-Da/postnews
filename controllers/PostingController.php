<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Article;
use app\models\ArticleSearch;
use yii\filters\VerbFilter;

/**
 * Контроллер для файлов в директории "Posting"
 * 
 */
class PostingController extends Controller
{
    /**
     * Установка правил поведения и работы котроллера
     * 
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Создание и отображения объектов модели авторских статей
     * Основная страница
     * 
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Создание и отображения объектов модели авторских статей
     * Превью содержания авторской статьи
     * 
     * @param integer
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Создание и отображения объектов модели для создания авторских статей 
     * Изменение статуса авторской статьи (редактирование)
     * 
     * @param integer
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idArticle]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Создание и отображения объектов модели для создания авторских статей
     * Удаление авторской статьи
     * 
     * @param integer 
     * @return mixed
     * @throws NotFoundHttpException 
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Поиск объекта (авторской стаьи) модели по id
     * 
     * @param integer 
     * @return Article 
     * @throws NotFoundHttpException 
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
