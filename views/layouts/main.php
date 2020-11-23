<?php
    use app\widgets\Alert;
    use yii\helpers\Html;
    use yii\bootstrap\Nav;
    use yii\bootstrap\NavBar;
    use yii\widgets\Breadcrumbs;
    use app\assets\AppAsset;

    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://use.fontawesome.com/aac5c45839.js"></script>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body onload="editMode();">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-inverse navbar-fixed-top font-navabr-brand menu'],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Нововсти', 'url' => ['/site/index']],
            ['label' => 'Регистрация', 'url' => ['/site/signup']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Авторизация', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => ['label' => 'Новости', 'url' => '/'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container-toolbar">      
        <div class="container-toolbar">
	        <div class="menu-toggle">
	        	<span class="fa fa-plus"></span>
	        </div>
	        <div class="menu-round">
	        	<div class="btn-app">
	        		<div class="fa fa-picture-o gallery"></div>
	        	</div>
	        	<div class="btn-app">
	        		<div class="fa fa-pencil"></div>
	        	</div>
	        	<div class="btn-app">
	        		<div class="fa fa-angle-double-up toolbar-button-up"></div>
	        	</div>
	        </div>
	        <div class="menu-line">
	        	<div class="btn-app">
                    <div class="fa fa-vk"></div>
	        	</div>
	        	<div class="btn-app">
	        		<div class="fa fa-facebook"></div>
	        	</div>
	        	<div class="btn-app">
	        		<div class="fa fa-instagram"></div>
                </div>
                <div class="btn-app">
	        		<div class="fa fa-twitter"></div>
	        	</div>
	        </div>
	    </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
