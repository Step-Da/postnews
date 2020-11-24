<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="article-form">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]); ?>
        <div class="form-group">
            <label>Статус</label>
            <select id="statusList" class="form-control">
                <option value="0">Статья не проверена</option>
                <option value="1">Статья проверена</option>
            </select>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Сохранить изменения ', ['class' => 'btn btn-success']) ?>
        </div>
        <?= $form->field($model, 'status')->hiddenInput(['id' => 'statusInput'])->label(''); ?>
    <?php ActiveForm::end(); ?>
</div>