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

Another example

```php
$chartConfiguration = [
        'type' => 'xy',
        'dataProvider' => [['y' => 10, 'x' => 14, 'value' => 59, 'y2' => -5, 'x2' => -3, 'value2' => 44],
                           ['y' => 5, 'x' => 3, 'value' => 50, 'y2' => -15, 'x2' => -8, 'value2' => 12],
                           ['y' => -10, 'x' => -3, 'value' => 19, 'y2' => -4, 'x2' => 6, 'value2' => 35],
                           ['y' => -6, 'x' => 5, 'value' => 65, 'y2' => -5, 'x2' => -6, 'value2' => 168],
                           ['y' =>  15, 'x' => -4, 'value' => 92, 'y2' => -10, 'x2' => -8, 'value2' => 102],
                           ['y' => 13, 'x' => 1, 'value' => 8, 'y2' => -2, 'x2' => -3, 'value2' => 41],
                           ['y' => 1, 'x' => 6, 'value' => 35, 'y2' => 0, 'x2' => -3, 'value2' => 16],
                          ],
        'pathToImages' =>  '../amcharts/images/',
        'startDuration' => 1.5,
        'valueAxes' => [['position' => 'bottom',
                         'axisAlpha' => 0,
                         'minMaxMultiplayer' => 1.2
                        ],
                        ['position' => 'left',
                         'axisAlpha' => 0,
                         'minMaxMultiplayer' => 1.2
                        ]],

        'graphs' => [['valueField' => 'value',
                      'xField' => 'x',
                      'yField' => 'y',
                      'lineAlpha' => 0,
                      'bullet' => 'bubble',
                      'lineColor' => '#b0de09',
                      'balloonText' => 'x:<b>[[x]]</b> y:<b>[[y]]</b><br>value:<b>[[value]]</b>'
                      ],
                      ['valueField' => 'value2',
                       'xField' => 'x2',
                       'yField' => 'y2',
                       'lineAlpha' => 0,
                       'bullet' => 'bubble',
                       'lineColor' => '#fcd202',
                       'balloonText' => 'x:<b>[[x]]</b> y:<b>[[y]]</b><br>value:<b>[[value]]</b>'
                      ]],
        'chartCursor' => [],
        'chartScrollbar' => []
];
echo AmChart::widget(['chartConfiguration' => $chartConfiguration]);
```