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
        'js/jquery-2.1.3.min.js',
        'js/script.min.js',
        'js/script.js'
    ];
    public $depends = [
       /* 'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
    ];
}
