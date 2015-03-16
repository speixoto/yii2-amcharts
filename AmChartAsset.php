<?php

/**
 * The MIT License (MIT)
 * Copyright (c) 2013 Sérgio Peixoto
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace speixoto\amcharts;

use yii\helpers\Url;
use yii\web\AssetBundle;
use Yii;

/**
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 *
 * @link https://github.com/speixoto/yii2-amcharts
 * @link http://www.amcharts.com/
 */
class AmChartAsset extends AssetBundle
{
    public $language;
    public $sourcePath = '@bower/amcharts/dist/amcharts';
    public $css = [];
    public $js = [
        'amcharts.js',

    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
    }

    /**
     * @param string $type serial, xy, radar, pie, gauge, funnel
     */
    public function addTypeJs($type){
        if($type=='stock'){
            $path = Yii::$app->view->assetManager->publish('@bower/amcharts-stock/dist/amcharts/amstock.js');
            $this->js[] = 'serial.js';
            Yii::$app->view->registerJsFile($path[1],['depends' =>self::className() ]);
        }else{
            $this->js[] = $type . '.js';
        }
    }

    public function addThemeJs($theme)
    {
        $this->js[] = 'themes/' . $theme . '.js';
    }

    public function addLanguageJs($language = null)
    {
        $language = $language ? substr($language,0,2) : substr(Yii::$app->language,0,2);
        if($language!='en'){
            $this->js[] = 'lang/' . $language . '.js';
        }
    }

    public function addExportJs()
    {
        $exportJsPaths = [
            'exporting/amexport.js',
            'exporting/canvg.js',
            'exporting/filesaver.js',
            'exporting/jspdf.js',
            'exporting/jspdf.plugin.addimage.js',
            'exporting/rgbcolor.js',
        ];
        foreach ($exportJsPaths as $path)
        {
            $this->js[] = $path;
        }
    }
}