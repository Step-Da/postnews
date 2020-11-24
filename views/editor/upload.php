<?php

use Codeception\Util\HttpCode;
use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use yii\grid\GridView;
    
    $this->title = 'Галерея изображений';
?>

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

<div class="show-image form-group">
    <?php if($model->image): ?>
        <img src="/upload/<?= $model->image?>" alt="Нет">
    <?php endif; ?>
</div>

<div class="form-group">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => ['class' => 'siteText'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nameImage',
            'type',
            'size',
            [
                'attribute' => 'pathImage',
                'format' => 'raw',
                'value' => function($model){
                return Html::img(Html::encode($model->pathImage));
                }
            ],
        ],
    ]); ?>
</div>