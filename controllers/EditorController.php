<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\UploadImage;
use app\models\ImageSearch;    
use app\models\Article;

/**
 * Контроллер для файлов в директории "Editor"
 * 
 */
class EditorController extends Controller
{
    /**
     * Создание и отображения объектов модели для создания авторских статей 
     * 
     * @param string
     * @return mixed
     */
    public function actionCreate()
    {
        $uploadModel = new UploadImage;
        $model = new Article();
        $paramList = [
            'prompt' => 'Выберите изображение...', 
            'id' => 'nameFileList',
            'class' => 'edit-font edit-select-font',
        ];
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goBack();
        }
        return $this->render('create', [
            'model' => $model,
            'list' => $uploadModel->selectDirImage(),
            'param' => $paramList,
        ]);
    }
    /**
     * Создание и отображения объектов модели для загрузки нового изображения в галерею
     * 
     * @param string
     * @return mixed
     */
    public function actionUpload()
    {
        $model = new UploadImage();
        $searchModel = new ImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(Yii::$app->request->isPost){
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload();
            return $this->goBack();
        }
        return $this->render('upload', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}