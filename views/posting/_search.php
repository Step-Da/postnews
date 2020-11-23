<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="article-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
        <?= $form->field($model, 'idArticle') ?>
            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'text') ?>
            <?= $form->field($model, 'id_author') ?>
        <?= $form->field($model, 'status') ?>

        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
