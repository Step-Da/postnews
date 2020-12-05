<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Основной пакет активов приложения.
 *
 * @author 
 * @since
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css', // основной стиль веб-ресурса
        'css/scrollbar.css', // основной стиль скроллбара
        'css/header.css', // основной стиль шапки веб-ресурса
        'css/toolbar.css', // основной стиль меню инструментов
        'css/editor.css', // основной стиль редактора авторских статей 
        'css/articles.css', // основной стиль для отображения статей
        'css/effect.css', // дополнительный стиль для отображения эффектов
    ];
    public $js = [
        'js/JQuery.js', // библиотека jQuery
        'js/toolbar.js', // расширенные возможности меню инструментов
        'js/word.js'// расширенные возможности меню текстового редактора для статей
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
