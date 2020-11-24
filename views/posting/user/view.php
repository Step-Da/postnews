<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = '(#'.$model->id.') '.$model->username;
    $this->params['breadcrumbs'][] = ['label' => 'Список статей', 'url' => ['posting/index']];
    $this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
?>
<div class="user-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Изменить роль', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить профиль', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить профиль этого автора?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Идентификационный номер',
                'value' => $model->id,
                'contentOptions' => ['class' => 'siteText'],
                'captionOptions' => ['class' => 'siteText'],
            ],
            'username',
            [
                'attribute' => 'role',
                'format' => 'raw',
                'value' => function($model){
                    return $model->role == 'Author' ? '<span class="text-success">Автор</span>' : '<span class="text-warning">Редактор</span>';                },
                'captionOptions' => ['class' => 'siteText'],
            ],
        ],
    ]) ?>
</div>
