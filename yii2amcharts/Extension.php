<?php
namespace yii2amcharts;

use Yii;

/**
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 */
class Extension extends \yii\base\Extension
{
    /**
     * @inheritdoc
     */
    public static function init()
    {
        Yii::setAlias('@yii2amcharts', __DIR__);
    }
}