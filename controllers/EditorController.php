<?php
    namespace app\controllers;
    
    use Yii;
    use yii\web\Controller;
    use yii\web\UploadedFile;
    use app\models\UploadImage;

    class EditorController extends Controller
    {
        public function actionArticles()
        {
            $uploadModel = new UploadImage;
            $paramList = [
                'prompt' => 'Выберите изображение...', 
                'id' => 'nameFileList',
                'class' => 'edit-font edit-select-font',
            ];
            return $this->render('articles',[
                'list' => $uploadModel->selectDirImage(),
                'param' => $paramList,
            ]);
        }

        public function actionUpload(){
            $model = new UploadImage();
            if(Yii::$app->request->isPost){
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->upload();
                return $this->render('upload', ['model' => $model]);
            }
            return $this->render('upload', ['model' => $model]);
        }
    }
?>