<?php
    $this->title = 'Главная страница новостей';
?>
<div class="site-index">
    <div class="informer-block">
        <div class="usd-value item-informer-block">
            <i class="fa fa-usd"></i>
            <label><?= $rub ?></label>
        </div>
        <div class="eur-value  item-informer-block">
            <i class="fa fa-eur"></i>
            <label><?= $eur ?></label>
        </div>
        <div class="tint-value  item-informer-block">
            <i class="fa fa-gbp"></i>
            <label><?= $gbp ?></label>
        </div>
        <div class="weather item-informer-block">
            <i class="fa fa-thermometer-half" aria-hidden="true"></i>
            <label><?= $dataWeather->main->temp_min ?></label>
        </div>
        <div class="weather item-informer-block">
            <i class="fa fa-thermometer-full" aria-hidden="true"></i>
            <label><?= $dataWeather->main->temp_max ?></label>
        </div>
        <div class="weather item-informer-block">
            <i class="fa fa-tint" aria-hidden="true"></i>
            <label><?= $dataWeather->wind->speed;?>&percnt;</label>
        </div>
    </div>
    <div class="content">
        ...
        Content
        <div class="tt"></div>
    </div>
</div>
