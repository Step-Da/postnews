<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\UserTable;
use app\models\UserTableSearch;
use yii\filters\VerbFilter;

/**
 * Контроллер для файлов в директории "User"
 * 
 */
class UserController extends Controller
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
     * Создание и отображения объектов модели пользователей
     * Таблица с выводом информации пользователей в системе новстного портала
     * 
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserTableSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('/posting/user/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Создание и отображения объектов модели пользователей
     * Вывод подробной информации выбранного пользователя в системе новостного портала
     * 
     * @param integer 
     * @return mixed
     * @throws NotFoundHttpException 
     */
    public function actionView($id)
    {
        return $this->render('/posting/user/view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Создание и отображения объектов модели пользователей
     * Изменение роли у выбранного пользователя в системе новостного портала 
     * 
     * @param integer 
     * @return mixed
     * @throws NotFoundHttpException 
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/user/view', 'id' => $model->id]);
        }

        return $this->render('/posting/user/update', [
            'model' => $model,
        ]);
    }

    /**
     * Создание и отображения объектов модели пользователей
     * Удаление профиля пользователя из системы новостного портала
     * 
     * @param integer 
     * @return mixed
     * @throws NotFoundHttpException 
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['/user/index']);
    }

    /**
     * Поиск объекта (пользователя) модели по id
     * 
     * @param integer
     * @return UserTable
     * @throws NotFoundHttpException 
     */
    protected function findModel($id)
    {
        if (($model = UserTable::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
