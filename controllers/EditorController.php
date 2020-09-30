<?php
    namespace app\controllers;
    
    use yii\web\Controller;

    class EditorController extends Controller
    {
        public function actionArticles()
        {
            return $this->render('articles');
        }
    }
?>