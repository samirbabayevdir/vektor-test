<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\JqueryAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/slick.css',
        'css/style.css'
    ];
    public $js = [
        'js/jquery-3.5.1.min.js',
        'js/bootstrap.bundle.min.js',
        'js/jquery.accordion.js',
        'js/jquery.cookie.js',
        'js/slick.min.js',
        'js/script.js',
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
        // JqueryAsset::class,
        // // BootstrapAsset::class,
        // BootstrapPluginAsset::class,
    ];
}
