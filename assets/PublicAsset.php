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
class PublicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "http://fonts.googleapis.com/css?family=Roboto:300,400,700|",
        "public/fonts/font-awesome.min.css",
        "public/css/site.css",
        "public/css/style.css",
        "public/css/font-awesome.min.css",
    ];
    public $js = [
        "public/js/ie-support/html5.js",
        "public/js/ie-support/respond.js",
        "public/js/jquery-1.11.1.min.js",
        "public/js/plugins.js",
        "public/js/app.js",
    ];

    public $depends = [
    ];
}
