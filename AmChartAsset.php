<?php
namespace speixoto\amcharts;

use yii\web\AssetBundle;

/**
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 */
class AmChartAsset extends AssetBundle
{
    public $sourcePath = '@vendor/speixoto/yii2-amcharts/speixoto/amcharts/assets';
    public $css = [];
    public $js = [
        'js/amcharts.js',
        'js/funnel.js',
        'js/gauge.js',
        'js/pie.js',
        'js/radar.js',
        'js/serial.js',
        'js/xy.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}