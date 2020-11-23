<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = ['label' => 'Редакторская', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
?>
<div class="article-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Изменить статью', ['update', 'id' => $model->idArticle], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить статью', ['delete', 'id' => $model->idArticle], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить статью этого автора?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Номер статьи',
                'value' => $model->idArticle,
                'contentOptions' => ['class' => 'siteText'],
                'captionOptions' => ['class' => 'siteText'],
            ],
            'name',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model){
                    return $model->status ? '<span class="text-success">Статья проверена</span>' : '<span class="text-danger">Статья не проверена</span>';
                },
                'captionOptions' => ['class' => 'siteText'],
            ],
            'author.username',
        ],
    ]) ?>
    <hr><div>
        <?= $model->text;?>
    </div>
</div>
