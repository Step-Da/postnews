<?php
    namespace app\controllers;
    
    use Yii;
    use yii\web\Controller;
    use yii\web\UploadedFile;
    use app\models\UploadImage;
    use app\models\Image;

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

        public function actionUpload()
        {
            $model = new UploadImage();
            $querySelectImage = Image::find();
            $gallery = $querySelectImage->where(['id_user' => Yii::$app->user->identity->id])->all();

            if(Yii::$app->request->isPost){
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->upload();
                return $this->goBack();
            }
            return $this->render('upload', [
                'model' => $model,
                'gallery' => $gallery,
            ]);
        }
    }
?>