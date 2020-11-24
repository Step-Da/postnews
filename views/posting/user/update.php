<?php
    use yii\helpers\Html;

    $this->title = 'Изменение роли у пользователя: (#'.$model->id.') '.$model->username;
    $this->params['breadcrumbs'][] = ['label' => 'Список пользователей', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => '(#'.$model->id.') '.$model->username, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = 'Изменение роли';
?>
<div class="user-table-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
