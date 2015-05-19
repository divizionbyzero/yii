<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

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
        //'css/site.css',
        'css/fonts.css',
        'css/login.css',
        'css/style.css',
        'css/reset.css',
        'css/bootstrap.min.css',
    ];
    public $js = [
        'js/angular.min.js',
        'js/app.js',

    ];
    public $depends = [
     //   'yii\web\YiiAsset',
    //    'yii\bootstrap\BootstrapAsset',
    ];
}