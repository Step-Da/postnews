<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>

<div class="article-form">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'name']); ?>
        <?= $form->field($model, 'text')->hiddenInput(['maxlength' => true,  'id' => 'atext']); ?>
        <?= $form->field($model, 'id_author')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(''); ?>
        <?= $form->field($model, 'status')->hiddenInput(['value' => 0])->label(''); ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'id' => 'createArticleButton']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
<?php include(Yii::getAlias('@app/views/editor/word.php'));?>