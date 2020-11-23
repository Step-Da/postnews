<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    
    $this->title = 'Галерея изображений';
?>

<table border=" solid">
    <caption>Галлерея изображения пользователя: "<?= Yii::$app->user->identity->username ?>"</caption>
    <tr>
        <th>Наименование</th>
        <th>Тип</th>
        <th>Размер</th>
        <th>Превью</th>
    </tr>
    <?php foreach($gallery as $image): ?>
        <tr>
            <td> <?= Html::encode($image->nameImage);?> </td>
            <td> <?= Html::encode($image->type);?> </td>
            <td> <?= Html::encode($image->size);?>&nbsp;KB</td>
            <td> <?= Html::img(Html::encode($image->pathImage));?> </td>
        </tr>
    <?php endforeach; ?>
</table>

<fieldset>
    <div class="image-form">
        <div class="image-active-form">
            <?php $form = ActiveForm::begin() ?>
                <?= $form->field($model, 'image')->fileInput() ?>
                <button class="form-control">Загрузить</button>
            <?php ActiveForm::end() ?>
        </div>
    </div>
<fieldset>

<div class="show-image">
    <?php if($model->image): ?>
        <img src="/upload/<?= $model->image?>" alt="Нет">
    <?php endif; ?>
</div>