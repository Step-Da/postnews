<?php
    use app\widgets\Alert;
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
    <div class="wrapper-content">
        <?= Alert::widget() ?>
        <div class="slogan-box">
            <h3 class="slogan">Свежие статьи на разные темы ...</h1>
        </div>
        <div class="content">
            <?php foreach($postnews as $news): ?>
                <ol class="articles">
                    <li class="articles__article" style="--animation-order:1">
                        <a class="articles__link" href="site/view?news=<?= $news['idArticle']; ?>">
                            <div class="articles__content articles__content--lhs">
                                <h2 class="articles__title"><?= $news['name']?></h2>
                                <div class="articles__footer">
                                    <p><?= $news['username']?></p><time>  
                                </div>
                            </div>
                            <div class="articles__content articles__content--rhs" aria-hidden="true">
                                <h2 class="articles__title"><?= $news['name']?></h2>
                                <div class="articles__footer">
                                    <p><?= $news['username']?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ol>
            <?php endforeach;?>
        </div>
    </div>
</div>
