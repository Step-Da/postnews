<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Currencies;
use app\models\News;
use app\models\SignupForm;
use app\models\UserTable;
use app\models\Weather;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.s
     *
     * @return string
     */
    public function actionIndex()
    {
        $currenciesModel = new Currencies;
        $weatherModel = new Weather;
        $weatherModel->getWeather();
        
        $news = News::find();
        $author = UserTable::find();

        $postnews = $news->where(['status' => 1])->all();

        if($weatherModel == false){
            $this->render('network');
        }
        
        if(Yii::$app->user->isGuest){
            Yii::$app->session->setFlash('warning', 'Авторизируйтесь или создайте профиль для расширения возможностей на сайте');
        }

        return $this->render('index', [
            'rub' => $currenciesModel->getCurrency('R01235'),
            'gbp' => $currenciesModel->getCurrency('R01035'),
            'eur' => $currenciesModel->getCurrency('R01239'),
            'dataWeather' => $weatherModel->getWeather(),
            'postnews' => $postnews,
            'author' => $author
        ]);
    }

    public function actionView()
    {
        $idNews = $_GET['news'];
        $news = News::find();
        $postnews = $news->where(['idArticle' => $idNews])->all();

        return $this->render('view',[
            'postnews' => $postnews,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Авторизация пользователя «'.Yii::$app->user->identity->username.'» успешна');
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Форма регистрации.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
