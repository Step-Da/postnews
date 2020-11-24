<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Проверка статьей';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a('Список пользователей', ['user/index']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => ['class' => 'siteText'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idArticle',
            'name',
            [
                'attribute' => 'id_author',
                'value'=>'author.username',
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->status ? '<span class="text-success">Статья проверена</span>' : '<span class="text-danger">Статья не проверена</span>';
                },
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {delete}'],
        ],
    ]); ?>
</div>
