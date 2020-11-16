<?php
    use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin() ?>
    <?= $form->field($model, 'image')->fileInput() ?>
    <button>Загрузить</button>
<?php ActiveForm::end() ?>

<?php if($model->image): ?>
    <img src="/upload/<?= $model->image?>" alt="">
<?php endif; ?>