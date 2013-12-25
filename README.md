yii2-amcharts
=============

AmCharts Widget for Yii 2


Installation
============

This package is registered at packagist.org, so to install it you just need to add a line to your composer.json

```json
"require": {
        "speixoto/yii2-amcharts":"*"
},
```

Usage
=====

Put in your view:

```php
use yii2amcharts\AmChart;

$chartConfiguration = [
    'type'         => 'serial',
    'dataProvider' => [['year'  => 2005, 'income' => 23.5],
                       ['year' => 2006, 'income' => 26.2],
                       ['year' => 2007, 'income' => 30.1]
                      ],
   'categoryField' =>  'year',
   'rotate'        => true,

   'categoryAxis' => ['gridPosition' => 'start', 'axisColor' => '#DADADA'],
   'valueAxes'    => [['axisAlpha' => 0.2]],
   'graphs'       => [['type' => 'column',
	                   'title' => 'Income',
	                   'valueField' => 'income',
	                   'lineAlpha' => 0,
	                   'fillColors' => '#ADD981',
	                   'fillAlphas' => 0.8,
	                   'balloonText' => '[[title]] in [[category]]:<b>[[value]]</b>'
                     ]]
];
echo AmChart::widget(['chartConfiguration' => $chartConfiguration]);
```