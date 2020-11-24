<?php
    use yii\helpers\Html;
    $this->title = 'Ошибка';
?>
<div class="site-error">
    <!-- <div class="error-internet">
        <div class="image-error">
            Html::img('@web/image/internet_error.png', ['alt' => 'Наш логотип', 'class' => 'image-error-internet'])
        <div>
        <div class="message-error">
            <h2 class="font-site-text">Подключение к интернету отсутствует</h2>
        </div>
    </div> -->

    <div class="site-error">
        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>
    </div>
</div>
