<?php
    use yii\helpers\Html;
    use yii\grid\GridView;

    $this->title = 'Пользователи';
    $this->params['breadcrumbs'][] = ['label' => 'Список статей', 'url' => ['posting/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => ['class' => 'siteText'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            [
                'attribute' => 'role',
                'format' => 'raw',
                'value' => function($model){
                    return $model->role == 'Author' ? '<span class="text-success">Автор</span>' : '<span class="text-warning">Редактор</span>';
                },
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>
</div>