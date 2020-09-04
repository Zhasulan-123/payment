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
class AlertAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
        'template/plugins/toastr/toastr.min.css',
    ];
    public $js = [
        'template/plugins/sweetalert2/sweetalert2.min.js',
        'template/plugins/toastr/toastr.min.js',
    ];
    public $depends = [
        'app\assets\ValidationAsset',
    ];
}
