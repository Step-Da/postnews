<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="user-table-form">
    <?php $form = ActiveForm::begin(); ?>
        <?= Html::label('Наименование пользователя: '.$model->username, ['class' => 'form-control']);?>
        <div class="form-group">
            <label>Роль</label>
            <select id="roleList" class="form-control">
                <option value="Author">Автор</option>
                <option value="Checking">Редактор</option>
            </select>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Присвоить новую роль', ['class' => 'btn btn-success']) ?>
        </div>
        <?= $form->field($model, 'role')->hiddenInput(['maxlength' => true, 'id' => 'roleInput'])->label(''); ?>
    <?php ActiveForm::end(); ?>
</div>
