<?php

namespace app\controllers;

use Yii;
use app\models\UserTable;
use app\models\UserTableSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class UserController extends Controller
{
    /**
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
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserTable();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/user/view', 'id' => $model->id]);
        }

        return $this->render('/posting/user/create', [
            'model' => $model,
        ]);
    }

    /**
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
