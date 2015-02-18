<?php
/**
 * Created by PhpStorm.
 * User: Vuilov
 * Date: 18.02.2015
 * Time: 10:14
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BxSliderAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/jquery.bxslider.css',
    ];
    public $js = [
        'js/jquery.bxslider.min.js',
        'js/jquery.fitvids.js',
        'js/init.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}