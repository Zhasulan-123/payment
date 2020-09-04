<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'template/plugins/fontawesome-free/css/all.min.css',
        'template/dist/css/adminlte.min.css',
    ];
    public $js = [
        'template/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'template/dist/js/adminlte.min.js',
    ];
    public $depends = [
        'app\assets\JqueryAsset',
    ];
}
