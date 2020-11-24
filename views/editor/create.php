<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<?php include(Yii::getAlias('@app/views/editor/word.php')) ?>
<div class="article-form">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'id' => 'name']); ?>
        <div class="form-group">
            <?= Html::submitButton('Создать статью', ['class' => 'btn btn-success', 'id' => 'createArticleButton']) ?>
        </div>
        <?= $form->field($model, 'text')->hiddenInput(['maxlength' => true,  'id' => 'atext'])->label(''); ?>
        <?= $form->field($model, 'id_author')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(''); ?>
        <?= $form->field($model, 'status')->hiddenInput(['value' => 0])->label(''); ?>
    <?php ActiveForm::end(); ?>
</div>
