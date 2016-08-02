<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
        'css/libs.min.css',
        'css/style.min.css',
    ];
    public $js = [
        /*'js/jquery-2.1.3.min.js',*/
        'https://api-maps.yandex.ru/2.1/?lang=ru_RU',

        'js/moment.js',
        'js/jquery.datetimepicker.full.min.js',
        'js/jquery.fancybox.js',
        'js/jquery.fancybox.pack.js',
        'js/script.min.js',
        'js/script.js',
        'js/general.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
